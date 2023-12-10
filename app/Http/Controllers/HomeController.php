<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Gallery;
use App\Models\VWGallery;
use App\Models\ContactForm;
use App\Models\Download;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index()
    {
        return view('website.index');
    }

    public function about()
    {
        $about = AboutPage::where('description', 'Core')->get();
        return view('website.about', ['about' => $about]);
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function services(){
        return view('website.service');
    }

    public function gallery()
    {
        $gallery = VWGallery::orderBy('name')->get();
        return view('website.gallery', ['gallery' => $gallery]);
    }

    public function view_gallery($group_id)
    {
        $gallery = Gallery::where('gallery_group', $group_id)->get();
        return view('website.view_gallery', ['gallery' => $gallery]);
    }

    public function downloads()
    {
        $files = Download::orderBy('name')->get();
        return view('website.downloads', ['files' => $files]);
    }

    public function downloadFile($id)
    {
        $file = Download::find($id);

        $file->update([
            'downloads' => $file->downloads + 1,
        ]);

        $file_path = storage_path($file->path);
        $file_name = 'download.'.$file->file_ext;

        return response()->download($file_path, $file_name);
    }

    public function postForms(Request $request)
    {
        ContactForm::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ]);

        return back()->with('success', 'Your message has been sent. Thank you!');
    }

    public function news()
    {
        $posts = Post::orderBy('title')->get();
        return view('website.posts', ['posts' => $posts]);
    }

    public function view_news($id)
    {
        $post = Post::find($id);
        return view('website.view_post', ['post' => $post]);
    }

    public function stuff()
    {
        return view('website.staff');
    }

    public function board_members()
    {
        return view('website.board_members');
    }

    public function former_board_members()
    {
        return view('website.old_board_members');
    }

    public function committee_members()
    {
        return view('website.committee_members');
    }

    public function calender()
    {
        return view('website.calender');
    }

}
