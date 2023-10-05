<?php

namespace App\Http\Controllers\Auth;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::orderByDesc('id')->get();
        return view('auth.assets.index', ['assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
        ])->validate();

        $image = $request->file('file');
        $input['file'] = date('Y')."_".time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/uploads');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($request['width'], $request['height'], function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);

        Asset::create([
            'asset_name' => $request['name'],
            'description' => $request['description'],
            'path' => 'uploads/'.$input['file'],
            'width' => $request['width'],
            'height' => $request['height'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('my_assets')->with('success','Asset Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asset = Asset::find($id);
        return view('auth.assets.show', ['asset' => $asset]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asset = Asset::find($id);
        return view('auth.assets.create', ['asset' => $asset]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
        ])->validate();

        if(!empty($request->file('file'))){

            $asset = Asset::find($id);

            if(file_exists(public_path($asset->path))){
                unlink(public_path($asset->path));
            }

            $image = $request->file('file');
            $input['file'] = date('Y')."_".time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize($request['width'], $request['height'], function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);
    
            $asset->update([
                'asset_name' => $request['name'],
                'description' => $request['description'],
                'path' => 'uploads/'.$input['file'],
                'width' => $request['width'],
                'height' => $request['height'],
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

        else {
            Asset::find($id)->update([
                'asset_name' => $request['name'],
                'description' => $request['description'],
                'width' => $request['width'],
                'height' => $request['height'],
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

        return redirect('my_assets')->with('success','Asset Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::find($id);

        if(file_exists(public_path($asset->path))){
            unlink(public_path($asset->path));
        }

        $asset->delete();

        return redirect('my_assets')->with('success','Asset Deleted successfully');
    }
}
