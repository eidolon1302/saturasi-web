<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Title;

#[Title('Announcement')]
class Announcement extends Component
{
    public $title;
    public $contents;

    protected $rules = [
        'title' => ['required', 'min:5'],
        'contents' => ['required', 'min:10'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.pages.dashboard.announcement');
    }
}
