<?php

namespace App\Livewire\Pages\Dashboard\Announcements;

use App\Helper\Helper;
use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;


class Index extends Component
{
    use WithPagination;
    public $q;
    public $pagination = 10;
    public $title = '';
    public $message = '';
    
    public $search = '';

    protected $rules = [
        'title'    => 'required',
        'message'  => 'required'
    ];

    // public function mount()
    // {
    //     $this->item         = 10;
    //     $this->warning_msg  = "";
    //     $this->new_data     = new Announcement();
    // }

    public function save()
    {
        $validationRules = $this->rules;

        $this->validate();

        Announcement::create([
            'title' =>$this->title,
            'message' =>$this->message           
        ]);
        $this->reset();

        // return redirect()->to('');
    }

    public function delete(Announcement $item)
    {
        $deleted = $item->delete();
        if($deleted) {
            $this->warning_msg = "Pengumuman berhasil dihapus";
            return $this->dispatch('broadcast-saved');
        }
    }

    public function render()
    {
        if(!$this->q){
            $announcements = Announcement::latest()->simplePaginate($this->pagination);
        }else{
            $announcements = Announcement::where('title', 'like', '%' .$this->q. '%')
                            ->orWhere('message', 'like', '%' .$this->q. '%')
                            ->latest()
                            ->simplePaginate($this->pagination);
        }
        return view('livewire.pages.dashboard.announcements.index', [
            'announcements' => $announcements,
        ]);
        }
    
}
