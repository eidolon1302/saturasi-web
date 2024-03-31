<?php

namespace App\Helper;

use App\Models\Unit;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Error;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Image;
use ZipArchive;

class Helper
{
    public static function getURI($data_path)
    {
        $baseURL = env('APP_URL', 'http://localhost') . "/" . "storage/";
        return $baseURL . $data_path;
    }

    public static function getFileType($file)
    {
        $pos  = strpos($file, ';');
        $filetype = explode(':', substr($file, 0, $pos))[1];
        return $filetype;
    }

    /**
     * Get enum list  
     * Parameter: "gender", "marriage", "last_edu", "pemilu_year" or "caleg_status"
     */
    public static function getEnum(String $type)
    {
        switch ($type) {
            case 'gender':
                $enum = ['laki-laki', 'perempuan'];
                break;
            case 'marriage':
                $enum = ['belum kawin', 'kawin', 'cerai hidup', 'cerai mati'];
                break;
            case 'last_edu':
                $enum = ['tidak sekolah', 'SD', 'SMP', 'SMA/SMK', 'diploma', 'sarjana', 'magister', 'doktor'];
                break;
            case 'caleg_status':
                $enum = ['DCS', 'CT'];
                break;
            case 'pemilu_year':
                $years = [];
                $start_year = 2009;
                $end_year   = (int)(date('Y')) + 10;
                for ($item = $start_year; $item <= $end_year; $item++) {
                    array_push($years, $item);
                }
                $enum = $years;
                break;
            default:
                $enum = [];
                break;
        }

        return $enum;
    }

    /**
     * Compare text to given enum list
     */
    public static function compareToEnum(String $text, array $enum)
    {
        $score = 0;
        $selected = null;
        foreach ($enum as $key => $item) {
            $similarity = similar_text(
                strtolower((string)$item),
                strtolower($text)
            );
            $selected   = $similarity > $score ? $item : $selected;
            $score      = $similarity > $score ? $similarity : $score;
        }

        return $selected;
    }

    public static function decodeBase64($base64, $path = "images", $filename = "tmp", $ext = null)
    {
        $filetype   = self::getFileType($base64);
        $extension  = $ext ?? explode('/', $filetype)[1];
        $new_path   = $path . '/' . "{$filename}-" . date('YmdHis') . "." . $extension;

        if (
            preg_match('/^data:image\/(\w+);base64,/', $base64)
            || preg_match('/^data:application\/(\w+);base64,/', $base64)
        ) {
            $data = substr($base64, strpos($base64, ',') + 1);

            $data = base64_decode($data);
            Storage::put("public/{$new_path}", $data, 'public');
            return $new_path;
        }
    }

    public static function ImgTob64($img)
    {
        $INCLUDED_EXT   = ['jpg', 'jpeg', 'png'];
        $file_ext       = pathinfo($img, PATHINFO_EXTENSION);
        throw_unless(
            in_array($file_ext, $INCLUDED_EXT),
            "File type not supported"
        );

        $file_data      = file_get_contents($img);
        $file_b64       = base64_encode($file_data);
        $b64_data       = 'data:image/' . $file_ext . ';base64,' . $file_b64;

        return $b64_data;
    }

    /*
    Compressing image by reduce image quality and/or change width and/or height image
    */
    public static function compressImg(
        string $img_path,
        int $quality = 80,
        int $width = null,
        int $height = null,
        string $outExt = "jpeg"
    ) {
        $img = Image::make($img_path);
        if ($width | $height) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $img->save($img_path, $quality, $outExt);

        return $img;
    }

    /**
     * 
     */
    public static function getTreeData(User $data, $referal_id=null, $created_by=null)
    {
        $error_msg = null;
        $count = 0;
        $recruites_data = $data->isCaleg() ? $data->recruites : $data->registers;
        $recruiter_data = $data->isCaleg() ? ($data->recruiter ?? null) : ($data->registrant ?? null);

        try {
            if (!$recruites_data)
                return (object) array(
                    'total'         => 0,
                    'recruiter'     => $recruiter_data,
                    'recruites'     => null
                );

            $count  += $recruites_data->count();
            foreach ($recruites_data as $key => $item) {
                if ($referal_id == $item->id || $created_by == $item->id)
                    return (object) array(
                        'total'         => 0,
                        'recruiter'     => $recruiter_data,
                        'recruites'     => []
                    );
                $count += self::getTreeData($item, $referal_id, $created_by)->total;
            }
        } catch (\Throwable $th) {
            $error_msg = $th->getMessage();
        }

        return (object) array(
            'total'         => $count,
            'recruiter'     => $recruiter_data,
            'recruites'     => $recruites_data,
            'error'         => $error_msg
        );
    }

    /**
     * Generate KTA from nik, date birth, village id, unit_id (only for pengurus)
     */
    public static function generateKTA(
        $nik = null,
        $date_birth = null,
        $village_id = null,
        $unit_id = null
    ) {
        if (!$nik | !$date_birth | !$village_id) return null;

        $number                 = User::max('id') + 1;
        $date                   = date_create($date_birth);
        $kode_unit              = "1210";

        if ($unit_id) {
            $unit       = Unit::find($unit_id);
            $kode_unit  = $unit->type->code;
        }

        $kta              = substr($kode_unit, 2) . $village_id . date_format($date, "dmy") . sprintf('%04d', $number);

        return $kta;
    }

    public static function sendPushNotification($notifable, $fields, $route = null)
    {
        $FCM_API_KEY = env('FCM_TOKEN', '');

        $data =  [
            "to" => $notifable,
            "notification" => $fields,
            "data" => [
                'route' => $route,
            ]
        ];

        $client     = new Client();

        try {
            $request    = $client->request(
                'POST',
                'https://fcm.googleapis.com/fcm/send',
                [
                    'headers'   => [
                        'Authorization' => "key={$FCM_API_KEY}",
                        'Content-Type'  => 'application/json'
                    ],
                    'json'      => $data
                ]
            );

            $response   = json_decode($request->getBody());
        } catch (\Throwable $th) {
            if ($th->getCode() == 401)
                $response = (object) array('error' => 'Autentikasi gagal');
            else
                $response = (object) array('error' => $th->getMessage());
        }

        return $response;
    }

    public static function zipRelawanData($caleg_id=null, $ktp=true, $kta=false)
    {
        $ktp_list = $kta_list = collect();
        $fields = ['id', 'username'];
        try {
            if (!$ktp && !$kta) throw new Error("At least one ktp or kta param must be true");
            if ($ktp) $fields[] = 'ktp_photo';
            if ($kta) $fields = array_merge($fields, ['profile_photo_path', 'name', 'ftitle', 'btitle', 'place_birth', 'address', 'gender']);
            if (!file_exists(storage_path('app/livewire-tmp'))) {
                mkdir(storage_path('app/livewire-tmp'), 0777, true);
            }

            $relawan    = User::select($fields)->doesntHave('caleg');
            $relawan    = $kta ? $relawan->with('province:name', 'regency:name', 'village:name') : $relawan;
            $relawan    = $caleg_id ? $relawan->where('referal_id', $caleg_id) : $relawan;
            $relawan    = $relawan->get();

            if ($relawan->count() == 0)
                return (object)array('error' => 'Tidak ditemukan relawan terdaftar untuk user tersebut');


            foreach ($relawan as $item) {
                if ($ktp && $item->ktp_photo) {
                    $ktp_file = public_path("storage/{$item->ktp_photo}");
    
                    if (file_exists($ktp_file)) {
                        $ktp_list->push($ktp_file);
                    }
                }
    
                if ($kta) {
                    $file = self::generateKtaFile($item->id);
                    $date = date('YmdHis', strtotime(now()));
                    $file_name = "{$item->name}-{$date}.pdf";
                    $kta_file = "livewire-tmp/{$file_name}";
    
                    if (Storage::put($kta_file, $file)) {
                        $kta_list->push(storage_path("app/{$kta_file}"));
                    } else {
                        return (object) ['error' => 'storage error: Failed to store kta'];
                    }
                }
            }

            if ($ktp && $ktp_list->isEmpty())
                return (object)array('error' => 'Relawan yang terdata tidak memiliki foto ktp!');
            
            $time       = date('YmdHis');
            $zipname    = storage_path("app/livewire-tmp/data-relawan-{$caleg_id }-{$time}.zip");
            $zip        = new ZipArchive;
            if ($zip->open($zipname, ZipArchive::CREATE) !== true)
                return (object)array('error' => "zip error: Failed to create zip file");

            if ($ktp) {
                $ktp_list->each(function ($ktp) use ($zip) {
                    $zip->addFromString(basename($ktp), file_get_contents($ktp));
                });
            }
    
            if ($kta) {
                $kta_list->each(function ($kta) use ($zip) {
                    $zip->addFromString(basename($kta), file_get_contents($kta));
                });
            }
            
            if ($zip->close() !== true)
                return (object)array('error' => "zip error: {$zip->getStatusString()}");

            // dd($zip->open($zipname, ZipArchive::CREATE));
            return $zipname;
            
        } catch (\Throwable $th) {
            return (object)array('error' => "function error: {$th->getMessage()}");
        }
    }

    public static function generateKtaFile($id)
    {
        $user               = User::find($id);
        $user->printed_kta  = date("Y-m-d");
        $user->save();

        $photo          = $user->profile_photo_path;
        $photo_path     = $photo ? public_path("storage/" . $photo) : '';
        if (!file_exists($photo_path))
            $photo_path =  "https://www.iconninja.com/files/373/611/612/person-user-profile-male-man-avatar-account-icon.svg";
        $jabatan        = [];
        $profil_uri     = env('APP_URL', 'http://localhost') . "/profil" . "/" . $user->kta;

        $paper_size     = array(0, 0, 204.48, 324.48);
        $pdf            = PDF::loadView('exports.kta2', [
            'user'      => $user, // Change to dynamic user
            'photo'     => $photo_path,
            'jabatan'   => $jabatan,
            'qr'        => $profil_uri,
            'viewmode'  => false
        ])->setPaper($paper_size, 'landscape');

        return $pdf->download()->getOriginalContent();
    }
}

