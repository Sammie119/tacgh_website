<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ContactForm;
use App\Models\UserTracker;
use Illuminate\Http\Request;
use App\Models\TestimoniesForm;
use App\Models\PrayerRequestForm;
use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $data = [
            'users' => User::count(),
            'posts' => Post::where('is_published', 1)->count(),
            'sermons' => Message::count(),
            'downloads' => Download::count()
        ];

        return view('auth.dashboard', ['data' => $data]);
    }

    public function contactForms()
    {
        $forms = ContactForm::orderBy('is_read')->get();
        return view('auth.contact_forms.index', ['forms' => $forms]);
    }

    public function showForms($id)
    {
        $form = ContactForm::find($id);

        $form->update([
            'is_read' => 1,
        ]);

        return view('auth.contact_forms.show', ['form' => $form]);
    }

    public function deleteForms($id)
    {
        ContactForm::find($id)->delete();
        return redirect('/contact-forms')->with('success', 'Message deleted Successfully');
    }

    public function prayerRequestForms()
    {
        $forms = PrayerRequestForm::orderBy('is_read')->get();
        return view('auth.contact_prayer_forms.index', ['forms' => $forms]);
    }

    public function showPrayerRequestForms($id)
    {
        $form = PrayerRequestForm::find($id);

        $form->update([
            'is_read' => 1,
        ]);

        return view('auth.contact_prayer_forms.show', ['form' => $form]);
    }


    public function testimonyForms()
    {
        $forms = TestimoniesForm::orderBy('is_read')->get();
        return view('auth.contact_testimony_forms.index', ['forms' => $forms]);
    }

    public function editTestimonyForms($id)
    {
        $form = TestimoniesForm::find($id);

        return view('auth.contact_testimony_forms.show', ['form' => $form]);
    }

    public function showTestimonyForms($id)
    {
        $form = TestimoniesForm::find($id);

        if($form->is_read == 1){
            $form->update([
                'is_read' => 0,
            ]);
        } else {
            $form->update([
                'is_read' => 1,
            ]);
        }

        return redirect('/testimony-forms')->with('success', 'Successfully Done!!!');
    }
}
