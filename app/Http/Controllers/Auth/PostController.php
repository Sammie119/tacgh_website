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
        $posts = Post::orderByDesc('id')->get();

        return view('auth.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.posts.create');
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
            'is_publish' => ['required'],
        ])->validate();

        Post::firstOrCreate([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'is_published' => $request->is_publish,
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('posts')->with('success','Posts Created successfully');
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
        $post = Post::find($id);
        return view('auth.posts.create', ['post' => $post]);
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
            'is_publish' => ['required'],
        ])->validate();

        Post::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            'is_published' => $request->is_publish,
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('posts')->with('success','Posts Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return back()->with('success','Post Deleted successfully');
    }
}
