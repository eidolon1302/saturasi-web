<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;

class DashboardController extends Controller
{
    public function index()
    {
        $dataFeed = new DataFeed();

        return view('pages/dashboard/dashboard', compact('dataFeed'));
    }

    // /**
    //  * Displays the announcement screen
    //  *
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    //  */
    // public function announcement()
    // {
    //     return view('livewire.pages.dashboard.announcement');
    // }
}
