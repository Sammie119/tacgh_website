<?php

namespace App\Http\Controllers\Auth;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = AboutPage::all();
        return view('auth.about_page.index', ['about' => $about]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.about_page.create');
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
        
        AboutPage::firstOrCreate(
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

        return redirect('about-us')->with('success','About Us Added successfully');
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
        $about = AboutPage::find($id);
        return view('auth.about_page.create', ['about' => $about]);
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
        
        AboutPage::find($id)->update(
            [
                // 'name' => $request['name'],
                'description' => $request['description'],
                'subject' => $request['subject'],
                'updated_by' => get_logged_in_user_id(),
            ]
        );

        return redirect('about-us')->with('success','About Us updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
