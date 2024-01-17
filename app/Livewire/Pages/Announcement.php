<?php

namespace App\Livewire\Pages;

use App\Helper\Helper;
use App\Models\AnnouncementMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Announcement extends Component
{
    use WithPagination;

    public AnnouncementMessage $new_data;

    public $search;

    protected $rules = [
        'new_data.title'    => 'required',
        'new_data.message'  => 'required'
    ];

    public function mount()
    {
        $this->item         = 10;
        $this->warning_msg  = "";
        $this->new_data     = new AnnouncementMessage();
    }

    public function save()
    {
        $this->validate();

        $saved  = $this->new_data->save();
        if(!$saved) {
            $this->warning_msg = "Pengumuman gagal dibuat";
            $this->clear();
            return $this->dispatchBrowserEvent('broadcast-saved');
        }

        // $send   = Helper::sendPushNotification(
        //     "/topics/gerindra",
        //     [
        //         "title" => $this->new_data->title,
        //         "body" => $this->new_data->message,
        //         "content_available" => true,
        //         "priority" => "high"
        //     ]
        // );

        if(isset($send->error)){ 
            $this->warning_msg          = "Pengumuman tersimpan namun gagal terkirim";
            $this->new_data->status     = "fail";
            $this->new_data->status_msg = $send->error;
            $this->new_data->save();
            $this->clear();
            return $this->dispatchBrowserEvent('broadcast-saved');
        };
        
        $this->warning_msg          = "Pengumuman berhasil tersimpan dan terkirim";
        $this->new_data->status     = "send";
        $this->new_data->status_msg = $send->message_id;
        $this->new_data->save();
        $this->clear();
        return $this->dispatchBrowserEvent('broadcast-saved');
    }

    public function delete(AnnouncementMessage $item)
    {
        $deleted = $item->delete();
        if($deleted) {
            $this->warning_msg = "Pengumuman berhasil dihapus";
            return $this->dispatchBrowserEvent('broadcast-saved');
        }
    }

    public function clear()
    {
        $this->new_data = new AnnouncementMessage();
    }

    public function render()
    {
        $data = AnnouncementMessage::where('title', 'like', "%{$this->search}%")
            ->orWhere('message', 'like', "%{$this->search}%")
            ->latest()
            ->paginate($this->item);
        return view('livewire.pages.announcement', ['data' => $data]);
    }
}
