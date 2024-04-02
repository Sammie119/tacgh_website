<?php

namespace App\Http\Controllers\Auth;

use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = HomePage::all();
        return view("auth.home_page.index", ["home"=> $home]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.home_page.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $data = [
            'name' => "Home Page",
            'description' => $request['title'],
            'file' => $request['file'],
            'width' => 1234,
            'height' => 250,
        ];

        $asset = 1;
        if ($request->has('file')){
            $asset = $this->save_asset_image($data);

            $asset = $asset->id;
        }

        HomePage::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'asset_id' => $asset,
            'description' => $request['description'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('home-page')->with('success','Item Created successfully');
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
        $home = HomePage::find($id);
        // dd($home);
        return view("auth.home_page.create", ["home" => $home]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $home = HomePage::find($id);

        $data = [
            'name' => "Home Page",
            'description' => $request['title'],
            'file' => $request['file'],
            'width' => 1234,
            'height' => 250,
        ];

        $this->update_asset_image($home->asset_id, $data);

        $home->update([
            'name' => $request['name'],
            'title' => $request['title'],
            'asset_id' => $home->asset_id,
            'description' => $request['description'],
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('home-page')->with('success','Item Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $home = HomePage::find($id);

        $this->delete_asset_image($home->asset_id);

        $home->delete();

        return redirect('home-page')->with('success','Item Deleted successfully');
    }
}
