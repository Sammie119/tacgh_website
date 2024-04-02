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
        // $post = Post::select('title');
        return view('auth.carousel.index', ['carousels' => $carousels]);
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
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
            'description' => ['required'],
        ])->validate();

        $data = [
            'name' => "Carousel",
            'description' => 'Carousel',
            'file' => $request['file'],
            'width' => 1920,
            'height' => 1080,
        ];

        $asset = $this->save_asset_image($data);

        Carousel::create([
            'name' => 'Carousel',
            'asset_id' => $asset->id,
            'post_id' => 1,
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
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
            'description' => ['required'],
        ])->validate();

        $carousel = Carousel::find($id);

        $data = [
            'name' => "Carousel",
            'description' => "Carousel",
            'file' => $request['file'],
            'width' => 1920,
            'height' => 1080,
        ];

        $this->update_asset_image($carousel->asset_id, $data);

        $carousel->update([
            'name' => "Carousel",
            'asset_id' => $carousel->asset_id,
            'post_id' => 1,
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
