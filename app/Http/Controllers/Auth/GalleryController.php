<?php

namespace App\Http\Controllers\Auth;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VWGallery;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = VWGallery::all();
        return view('auth.galleries.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file.*' => ['required','image', 'mimes:jpg,jpeg,png,gif,svg', 'distinct','max:2048'],
            'post' => ['nullable', 'integer'],
            // 'width' => ['required', 'integer'],
            'tag' => ['required'],
            // 'height' => ['required', 'integer'],
        ])->validate();

        $num = Gallery::select('gallery_group')->orderByDesc('id')->first()->gallery_group ?? 0;
// dd($request->file('file'));
        foreach ($request->file('file') as $key => $image) {
            $input['file'] = $key."_".date('Y')."_".time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile
            // ->resize($request['width'], $request['height'], function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            ->save($destinationPath.'/'.$input['file']);

            Gallery::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'path' => 'uploads/'.$input['file'],
                'gallery_group' => $num + 1,
                'width' => 1, //$request['width'],
                'height' => 1, //$request['height'],
                'tag' => $request['tag'],
                'post_id' => empty($request['post']) ? 0 : $request['post'],
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

        return redirect('galleries')->with('success','Gallery Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::where('gallery_group', $id)->get();
        return view('auth.galleries.show', ['galleries' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::where('gallery_group', $id)->first();
        return view('auth.galleries.create', ['gallery' => $gallery]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file.*' => ['required','image', 'mimes:jpg,jpeg,png,gif,svg', 'distinct','max:2048'],
            'post' => ['nullable', 'integer'],
            // 'width' => ['required', 'integer'],
            'tag' => ['required'],
            // 'height' => ['required', 'integer'],
        ])->validate();

        $num = Gallery::find($id)->gallery_group;
// dd($request->file('file'));
        foreach ($request->file('file') as $key => $image) {
            $input['file'] = $key."_".date('Y')."_".time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile
            // ->resize($request['width'], $request['height'], function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            ->save($destinationPath.'/'.$input['file']);

            Gallery::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'path' => 'uploads/'.$input['file'],
                'gallery_group' => $num,
                'width' => 1, //$request['width'],
                'height' => 1, //$request['height'],
                'post_id' => $request['post'],
                'tag' => $request['tag'],
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

        return redirect('galleries')->with('success','Gallery Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $images = Gallery::where('gallery_group', $id)->get();

        foreach ($images as $image) {
            if(file_exists(public_path($image->path))){
                unlink(public_path($image->path));
            }

            $image->delete();
        }

        return redirect('galleries')->with('success','Gallery Deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyImage(string $id)
    {
        $image = Gallery::find($id);

        if(file_exists(public_path($image->path))){
            unlink(public_path($image->path));
        }

        $image->delete();

        return back()->with('success','Gallery Image Deleted successfully');
    }
}
