<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): view
    {
        //get posts
        $announcements = Announcement::latest()->paginate(10);
         //render view with posts
        return view('livewire.pages.dashboard.announcements.index', compact('announcements'));  
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): view
    {
        return view('livewire.pages.dashboard.announcements.create');
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
            'title'     => 'required|min:5',
            'content'     => 'required|min:10',
        ]);

        //create post
        Announcement::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect to index
        return redirect()->route('announcements.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $announcement = Announcement::findOrFail($id);

        //render view with post
        return view('livewire.pages.dashboard.announcements.show', compact('announcement'));
    }
}
