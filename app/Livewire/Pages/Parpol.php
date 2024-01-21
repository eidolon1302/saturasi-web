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
        if(!$this->q){
            $partais = Partai::orderBy('nomor', 'asc')->simplePaginate($this->pagination);
        }else{
            $partais = Partai::where('name', 'like', '%' .$this->q. '%')
                            ->orWhere('nomor', 'like', '%' .$this->q. '%')
                            ->orderBy('nomor', 'asc')
                            ->simplePaginate($this->pagination);
        }
        return view('livewire.pages.parpol', [
            'partais' => $partais,
        ]);
        }
}
