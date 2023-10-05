<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('auth.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('auth.posts.create', ['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'is_published' => ['required'],
        ])->validate();

        // Post::firstOrCreate([
        //     'category_id' => $request->cat_id,
        //     'gallery_id' => ,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'body' => $request->body,
        //     'is_published' => ,
        //     'created_by' => get_logged_in_user_id(),
        //     'updated_by' => get_logged_in_user_id(),,
        // ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
