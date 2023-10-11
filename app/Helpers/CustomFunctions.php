<?php

use App\Models\AboutPage;
use App\Models\Asset;
use App\Models\ContactPage;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\ServicePage;
use App\Models\Staff;
use App\Models\User;
use App\Models\VWEvent;

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

if(!function_exists("get_event")){
    function get_event($num = null): array
    {
        $events = VWEvent::where('expired_event', 1)->limit($num)->get();

        if($events){
            return $events->toArray();
        }

        return [];
    }
}

if(!function_exists("get_stuff")){
    function get_stuff($status = 'staff'): array
    {
        $staff = Staff::where('is_staff_or_board', $status)->orderBy('name')->get();

        if($staff){
            return $staff->toArray();
        }

        return [];
    }
}

if(!function_exists("get_date_time_format")){
    function get_date_time_format($date_time, $type = 'date'): string
    {
        if($type == "time"){
            return date('h:i A', strtotime($date_time));
        }
        elseif ($type == "date") {
            return date('F d, Y', strtotime($date_time));
        }

        return -1;
    }
}

if(!function_exists("get_asset_path")){
    function get_asset_path($id): string
    {
        $asset = Asset::find($id);

        if($asset){
            return $asset->path;
        }

        return -1;
    }
}

if(!function_exists("get_services")){
    function get_services(): array
    {
        $services = ServicePage::all();

        if($services){
            return $services->toArray();
        }

        return [];
    }
}

if(!function_exists("get_posts")){
    function get_posts($num = null): array
    {
        $posts = Post::orderByDesc('id')->limit($num)->get();

        if($posts){
            return $posts->toArray();
        }

        return [];
    }
}
