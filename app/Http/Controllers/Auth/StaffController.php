<?php

namespace App\Http\Controllers\Auth;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::orderBy('name')->get();
        return view('auth.staff.index', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif'],
            'position' => ['required'],
            'is_staff_or_board' => ['required'],
            'whatsapp' => ['required'],
            // 'image_path' => [],
        ])->validate();

        $data = [
            'name' => "Staff",
            'description' => $request['name'],
            'file' => $request['file'],
            'width' => 600,
            'height' => 600,
        ];

        $asset = $this->save_asset_image($data);

        Staff::firstOrCreate([
                'name' => $request['name'],
                'description' => $request['description'],
                'position' => $request['position'],
                'is_staff_or_board' => $request['is_staff_or_board'],
                'whatsapp_address' => $request['whatsapp'],
                'facebook_address' => $request['facebook'],
                'twitter_address' => $request['twitter'],
                'instagram_address' => $request['instagram'],
                'asset_id' => $asset->id,
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('staff')->with('success','Staff Created successfully');
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
        $staff = Staff::find($id);
        return view('auth.staff.create', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif'],
            'position' => ['required'],
            'is_staff_or_board' => ['required'],
            'whatsapp' => ['required'],
            // 'image_path' => [],
        ])->validate();

        $staff = Staff::find($id);

        $data = [
            'name' => "Staff",
            'description' => $request['name'],
            'file' => $request['file'],
            'width' => 600,
            'height' => 600,
        ];

        $this->update_asset_image($staff->asset_id, $data);

        $staff->update(
            [
                'name' => $request['name'],
                'description' => $request['description'],
                'position' => $request['position'],
                'is_staff_or_board' => $request['is_staff_or_board'],
                'whatsapp_address' => $request['whatsapp'],
                'facebook_address' => $request['facebook'],
                'twitter_address' => $request['twitter'],
                'instagram_address' => $request['instagram'],
                'asset_id' => $staff->asset_id,
                'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('staff')->with('success','Staff Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::find($id);

        if(file_exists(public_path($staff->image_path))){
            unlink(public_path($staff->image_path));
        }

        $staff->delete();

        return redirect('staff')->with('success','Staff Deleted successfully');
    }
}
