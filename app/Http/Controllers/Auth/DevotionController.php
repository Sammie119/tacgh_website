<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Devotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DevotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Devotion::orderByDesc('id')->get();
        return view('auth.devotions.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.devotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            // 'category_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'd_date' => ['required'],
            'status' => ['required'],
        ])->validate();

        Devotion::firstOrCreate([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'd_date' => $request->d_date,
            'status' => $request->status,
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('devotions')->with('success','Devotion Created successfully');
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
        $post = Devotion::find($id);
        return view('auth.devotions.create', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            // 'category_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'd_date' => ['required'],
            'status' => ['required'],
        ])->validate();

        Devotion::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'd_date' => $request->d_date,
            'status' => $request->status,
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('devotions')->with('success','Devotion Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Devotion::find($id);

        $post->delete();

        return back()->with('success','Devotion Deleted successfully');
    }
}
