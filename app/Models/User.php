<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Master;
use App\Models\Resume;
// Database Wilayah Kemendagri
use App\Models\RegProvince;
use App\Models\RegRegency;
use App\Models\RegDistrict;
use App\Models\RegVillage;
use App\Traits\CreatedUpdatedBy;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use CreatedUpdatedBy;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'status',
        'is_active',

        'ftitle',
        'btitle',
        'number',

        'place_birth',
        'date_birth',
        'phone',
        'gender',
        'marriage',
        'job',
        'hobby',
        'blood',
        'last_education',
        'address',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',

        'rw',
        'rt',
        'tps',
        'disabilitas',
        'description',
        'ktp_photo',
        'position_id',
        'type_unit',
        'unit_id',

        'facebook',
        'instagram',
        'tiktok',
        'referal_id',

        'profile_photo_path',
        'created_by',
        'updated_by',
        'fcm_token',

        'phone_type,',
        'phone_os',
        'latitude',
        'longitude',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        // 'profile_photo_url',
    ];

    // public function announcement(): Hasmany
    // {
    //     return $this->hasMany(related : Announcement::class);
    // }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if ($user->roles->count() == 0 & $user->status != 'system') {
                $user->roles()->attach(7);
            }
        });

        self::saved(function (User $user) {
            if ($user->roles->count() == 0 & $user->status != 'system') {
                $user->roles()->attach(7);
            }
        });
    }

    public function province()
    {
        return $this->belongsTo(RegProvince::class, 'province_id', 'id');
    }

    public function regency()
    {
        return $this->belongsTo(RegRegency::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(RegDistrict::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(RegVillage::class, 'village_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function unitType()
    {
        return $this->belongsTo(Master::class, 'type_unit', 'code');
    }

    public function jabatan()
    {
        return $this->belongsTo(Master::class, 'position_id', 'code');
    }

    public function resumes()
    {
        return $this->hasMany(Resume::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function dp()
    {
        return $this->belongsTo(Dpt::class, 'dpid', 'id');
    }

    public function recruites()
    {
        return $this->hasMany(User::class, 'referal_id', 'id');
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'referal_id', 'id');
    }

    public function registers()
    {
        return $this->hasMany(User::class, 'created_by', 'id');
    }

    public function registrant()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function lastUpdate()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function caleg()
    {
        return $this->hasMany(Caleg::class, 'user_id', 'id');
    }

    public function isCaleg()
    {
        return $this->caleg()->count() != 0;
    }

    public function point()
    {
        $point = $this->isCaleg() ? ($this->recruites()->count() ?? 0)
            : ($this->registers()->count() ?? 0);
        
        return $point;
    }
}
