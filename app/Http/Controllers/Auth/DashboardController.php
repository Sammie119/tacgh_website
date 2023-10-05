<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\UserTracker;
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
        return view('auth.dashboard');
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
}
