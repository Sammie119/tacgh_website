<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::orderByDesc('id')->get();
        return view("auth.messages.index", ["message"=> $message]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'preacher' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'type' => ['required'],
            'url' => ['required'],
        ])->validate();

        Message::firstOrCreate([
                'title' => $request['title'],
                'url' => $request['url'],
                'type' => $request['type'],
            ],
            [
                'preacher' => $request['preacher'],
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]);

        return redirect('message')->with('success','Message Created successfully');
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
        $message = Message::find($id);
        // dd($home);
        return view("auth.messages.create", ["message" => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'preacher' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'type' => ['required'],
            'url' => ['required'],
        ])->validate();

        $message = Message::find($id);

        $message->update([
                'title' => $request['title'],
                'url' => $request['url'],
                'type' => $request['type'],
                'preacher' => $request['preacher'],
                'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('message')->with('success','Message Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::find($id);

        $message->delete();

        return redirect('message')->with('success','Message Deleted successfully');
    }
}
