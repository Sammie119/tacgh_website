<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Download;
use App\Models\AboutPage;
use App\Models\VWGallery;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Mail\MailNotification;
use App\Models\PrayerRequestForm;
use App\Models\TestimoniesForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

    // About
    public function about()
    {
        return view('website.about');
    }
    public function missionVision()
    {
        return view('website.about_mission');
    }

    public function rulesBelief()
    {
        return view('website.about_belief');
    }

    public function rulesConduct()
    {
        return view('website.about_conduct');
    }

    public function tenets()
    {
        return view('website.about_tenets');
    }
    // end about

    public function contact()
    {
        return view('website.contact');
    }

    public function prayerRequest()
    {
        return view('website.prayer_request');
    }

    public function baseDirectorate($directorate){
        return view('website.base_directorates', ['directorate' => $directorate]);
    }

    public function socialServices($service){
        return view('website.base_directorates', ['directorate' => $service]);
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

    public function downloads($document)
    {
        switch ($document) {
            case 'apostolic_herald':
                $files = Download::where('type', 'Apostolic Herald')->orderBy('name')->get();
                $title = 'The Apostolic Herald';
                break;

            case 'riches_of_grace':
                $files = Download::where('type', 'Riches of Grace')->orderBy('name')->get();
                $title = 'Riches of Grace';
                break;

            case 'other_documents':
                $files = Download::where('type', 'Other Documents')->orderBy('name')->get();
                $title = 'Other Documents';
                break;
        }

        return view('website.downloads', ['files' => $files, 'title' => $title]);
    }

    public function downloadFile($id)
    {
        $file = Download::find($id);

        $file->update([
            'downloads' => $file->downloads + 1,
        ]);

        $file_path = storage_path($file->path);
        $file_name = $file->name.'.'.$file->file_ext;

        return response()->download($file_path, $file_name);
    }

    public function postForms(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required'],
            'message' => ['required'],
        ])->validate();

        // dd($request->all());

        // $secret = env('RECAPTCHAsecretkey');

        // $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$request['g-recaptcha-response']}";
        //     $verify = json_decode(file_get_contents($recaptchaUrl));

        // if (!$verify->success) {
        //     return back()->with('error', 'Recaptcha failed!');
        // }

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ];

        if (Mail::to('sarpongduahsamuel@gmail.com')->send(new MailNotification($data, 'contact'))) {
            ContactForm::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'subject' => $request['subject'],
                'message' => $request['message'],
            ]);

            return back()->with('success', 'Your message has been sent. Thank you!');
        } else {
            return back()->with('error', 'Your message would not be sent!');
        }

    }

    public function prayerRequestForms(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'contact' => ['required'],
            'type' => ['required'],
            'message' => ['required'],
        ])->validate();
        // dd($request->all());

        // $secret = '6Ld8YqMpAAAAAF0u2axUPdDEckbKHWC8fZUKvrFz';

        // $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$request['g-recaptcha-response']}";
        //     $verify = json_decode(file_get_contents($recaptchaUrl));

        // if (!$verify->success) {
        //     return back()->with('error', 'Recaptcha failed!');
        // }

        $data = [
            'name' => $request['name'],
            'contact' => $request['contact'],
            'type' => $request['type'],
            'message' => $request['message'],
        ];

        if (Mail::to('sarpongduahsamuel@gmail.com')->send(new MailNotification($data, 'prayer'))) {
            PrayerRequestForm::create([
                'name' => $request['name'],
                'contact' => $request['contact'],
                'type' => $request['type'],
                'message' => $request['message'],
            ]);

            return back()->with('success_1', 'Your message has been sent. Thank you!');
        } else {
            return back()->with('error_1', 'Your message would not be sent!');
        }

    }

    public function testimoniesForms(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'contact' => ['required'],
            'message' => ['required'],
        ])->validate();
        // dd($request->all());

        // $secret = '6Ld8YqMpAAAAAF0u2axUPdDEckbKHWC8fZUKvrFz';

        // $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$request['g-recaptcha-response']}";
        //     $verify = json_decode(file_get_contents($recaptchaUrl));

        // if (!$verify->success) {
        //     return back()->with('error', 'Recaptcha failed!');
        // }

        $data = [
            'name' => $request['name'],
            'contact' => $request['contact'],
            'message' => $request['message'],
        ];

        if (Mail::to('sarpongduahsamuel@gmail.com')->send(new MailNotification($data, 'testimony'))) {
            TestimoniesForm::create([
                'name' => $request['name'],
                'contact' => $request['contact'],
                'message' => $request['message'],
            ]);

            return back()->with('success_2', 'Your message has been sent. Thank you!');
        } else {
            return back()->with('error_2', 'Your message would not be sent!');
        }

    }

    public function messages($message)
    {
        switch ($message) {
            case 'videos':
                $msg = Message::where('type', 'Video')->orderByDesc('id')->get();
                $title = 'Videos';
                break;

            case 'sermons':
                $msg = Message::where('type', 'Sermon')->orderByDesc('id')->get();
                $title = 'Sermons';
                break;

            // case 'other_documents':
            //     $msg = Message::where('type', 'Other Documents')->orderBy('name')->get();
            //     $title = 'Other Documents';
            //     break;
        }

        return view('website.messages', ['files' => $msg, 'title' => $title]);
    }

    public function playMessages($id)
    {
        $msg = Message::find($id);
        return view('website.message_play', ['message' => $msg]);
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

    public function generalCouncil()
    {
        return view('website.leadership_general');
    }

    public function executivesMembers()
    {
        return view('website.leadership_executives');
    }

    public function councilApostlesProphets()
    {
        return view('website.leadership_council_ap');
    }

    public function managementTeam()
    {
        return view('website.leadership_management');
    }

    public function formerLeaderships()
    {
        return view('website.leadership_former');
    }

    public function profileOfLeadership($id)
    {
        $leader = Staff::find($id);
        return view('website.leadership_profile', ['leadership' => $leader]);
    }

    public function calender()
    {
        return view('website.calender');
    }

}
