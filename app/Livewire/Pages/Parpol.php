<?php

namespace App\Livewire\Pages;

use App\Helper\Helper;
use Livewire\WithPagination;
use App\Models\Partai;
use Livewire\Component;

class Parpol extends Component
{
    use WithPagination;
    public $q; // Query
    public $pagination = 10;

    public $search = '';
    
    public function render()
    {
        return view('livewire.pages.parpol');
    }
}
