<?php

use App\Models\AboutPage;
use App\Models\Asset;
use App\Models\ContactPage;
use App\Models\Gallery;
use App\Models\User;

if(!function_exists("get_logged_in_user_id")){
    function get_logged_in_user_id():int
    {
       return auth()->user()->id;
    }
}

if(!function_exists("get_logged_in_username")){
    function get_logged_in_username($id): string
    {
        return User::find($id)->name;
    }
}

if(!function_exists("get_contact_subject")){
    function get_contact_subject($name): string
    {
        $contact = ContactPage::where('name', $name)->first();

        if($contact){
            return $contact->subject;
        }

        return -1;
    }
}

if(!function_exists("get_asset")){
    function get_asset($name): string
    {
        $asset = Asset::where('asset_name', $name)->first();

        if($asset){
            return $asset->path;
        }

        return -1;
    }
}

if(!function_exists("get_singe_image_gallery")){
    function get_singe_image_gallery($group_id): string
    {
        $asset = Gallery::where('gallery_group', $group_id)->first();

        if($asset){
            return $asset->path;
        }

        return -1;
    }
}

if(!function_exists("get_about")){
    function get_about($name): string
    {
        $item = AboutPage::where('name', $name)->first();

        if($item){
            return $item->subject;
        }

        return -1;
    }
}



