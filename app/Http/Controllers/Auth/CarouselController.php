<?php

namespace App\Http\Controllers\Auth;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all();
        $post = Post::select('title');
        return view('auth.carousel.index', ['carousels' => $carousels, 'post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'post_id' =>['required', 'integer'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $data = [
            'name' => "Carousel",
            'description' => $request['name'],
            'file' => $request['file'],
            'width' => 1200,
            'height' => 900,
        ];

        $asset = $this->save_asset_image($data);

        Carousel::create([
            'name' => $request['name'],
            'asset_id' => $asset->id,
            'post_id' => $request['post_id'],
            'description' => $request['description'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('carousels')->with('success','Service Created successfully');
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
        $carousel = Carousel::find($id);
        return view('auth.carousel.create', ['carousel' => $carousel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'post_id' =>['required', 'integer'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $carousel = Carousel::find($id);

        $data = [
            'name' => "Carousel",
            'description' => $request['name'],
            'file' => $request['file'],
            'width' => 1200,
            'height' => 900,
        ];

        $this->update_asset_image($carousel->asset_id, $data);

        $carousel->update([
            'name' => $request['name'],
            'asset_id' => $carousel->asset_id,
            'post_id' => $request['post_id'],
            'description' => $request['description'],
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('carousels')->with('success','Service Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carousel = Carousel::find($id);

        $this->delete_asset_image($carousel->asset_id);

        $carousel->delete();

        return redirect('carousels')->with('success','Service Deleted successfully');
    }
}
