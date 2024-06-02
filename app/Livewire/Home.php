<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Home extends Component
{
    public function download()
    {
        $filePath = 'public/cv.pdf';  // Path to your CV

        if (!Storage::disk('public')->exists('cv.pdf')) {
            return abort(404);
        }

        return Storage::disk('public')->download('cv.pdf');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
