<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function save_asset_image($data)
    {
        Validator::make($data, [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
        ])->validate();

        $image = $data['file'];
        $input['file'] = date('Y')."_".time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($data['width'], $data['height'], function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['file']);

        return Asset::create([
            'asset_name' => $data['name'],
            'description' => $data['description'],
            'path' => 'uploads/'.$input['file'],
            'width' => $data['width'],
            'height' => $data['height'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);
    }

    protected function update_asset_image($id, $data)
    {
        Validator::make($data, [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
            'width' => ['required', 'integer'],
            'height' => ['required', 'integer'],
        ])->validate();

        if(!empty($data['file'])){

            $asset = Asset::find($id);

            if(file_exists(public_path($asset->path))){
                unlink(public_path($asset->path));
            }

            $image = $data['file'];
            $input['file'] = date('Y')."_".time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize($data['width'], $data['height'], function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);

           return $asset->update([
                'asset_name' => $data['name'],
                'description' => $data['description'],
                'path' => 'uploads/'.$input['file'],
                'width' => $data['width'],
                'height' => $data['height'],
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

        else {
           return Asset::find($id)->update([
                'asset_name' => $data['name'],
                'description' => $data['description'],
                'width' => $data['width'],
                'height' => $data['height'],
                'updated_by' => get_logged_in_user_id(),
            ]);
        }

    }
}
