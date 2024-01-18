<?php

namespace App\Livewire\Pages\Dashboard\Announcements;

use App\Helper\Helper;
use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Http\RedirectResponse;


class Index extends Component
{
    use WithPagination;

    public Announcement $new_data;

    public $search;

    protected $rules = [
        'new_data.title'    => 'required|string|max:255',
        'new_data.message'  => 'required|string'
    ];

    public function mount()
    {
        $this->item         = 10;
        $this->warning_msg  = "";
        $this->new_data     = new Announcement();
    }

    public function save()
    {
        // Validation rules can be added here based on your requirements
        $this->validate();

        // Save the new data to the database
        $this->new_data->save();

        // Optionally, you can reset form fields and show a success message
        $this->clear();
        $this->emit('announcementSaved', 'Announcement saved successfully.');

        // You can also redirect the user to another page if needed
        // return redirect()->to('/some-other-page');
    }



    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'new_data.title'    => 'required',
            'new_data.message'  => 'required'
        ]);

        //create post
        Announcement::create([
            'new_data.title'     => $request->title,
            'new_data.message'   => $request->message
        ]);

        //redirect to index
        return redirect()->route('announcements.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }




    public function delete(Announcement $item)
    {
        $deleted = $item->delete();
        if($deleted) {
            $this->warning_msg = "Pengumuman berhasil dihapus";
            return $this->dispatchBrowserEvent('broadcast-saved');
        }
    }

    public function clear()
    {
        $this->new_data = new Announcement();
    }

    public function render()
    {
        $data = Announcement::where('title', 'like', "%{$this->search}%")
            ->orWhere('message', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(5);
        return view('livewire.pages.dashboard.announcements.index', ['data' => $data]);
    }
    
}
