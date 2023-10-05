<?php

namespace App\Http\Controllers\Auth;

use App\Models\ContactPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactPage::all();
        return view('auth.contact_page.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.contact_page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'subject' => ['required'],
        ])->validate();
        
        ContactPage::firstOrCreate(
            [
                'name' => $request['name']
            ],
            [
                'description' => $request['description'],
                'subject' => $request['subject'],
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]
        );

        return redirect('contacts')->with('success','Contact Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = ContactPage::find($id);
        return view('auth.contact_page.create', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            // 'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'subject' => ['required'],
        ])->validate();
        
        ContactPage::find($id)->update(
            [
                // 'name' => $request['name'],
                'description' => $request['description'],
                'subject' => $request['subject'],
                'updated_by' => get_logged_in_user_id(),
            ]
        );

        return redirect('contacts')->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
