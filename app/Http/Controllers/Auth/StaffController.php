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
            'description' => ['required', 'max:255'],
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'contact' => ['required'],
            'position' => ['required'],
            'is_staff_or_board' => ['required'],
            'whatsapp' => ['required'],
            // 'image_path' => [],
        ])->validate();

        $image = $request->file('file');
        $input['file'] = 'staff_'.date('Y')."_".time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/uploads');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(600, 600, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['file']);

        Staff::firstOrCreate(
            [
                'contact' => $request['contact'],
            ],
            [
                'name' => $request['name'],
                'description' => $request['description'],
                'position' => $request['position'],
                'is_staff_or_board' => $request['is_staff_or_board'],
                'whatsapp_address' => $request['whatsapp'],
                'facebook_address' => $request['facebook'],
                'twitter_address' => $request['twitter'],
                'instagram_address' => $request['instagram'],
                'linkedin_address' => $request['linked_in'],
                'image_path' => 'uploads/'.$input['file'],
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
            'description' => ['required', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'contact' => ['required'],
            'position' => ['required'],
            'is_staff_or_board' => ['required'],
            'whatsapp' => ['required'],
            // 'image_path' => [],
        ])->validate();

        if(!empty($request->file('file'))){

            $staff = Staff::find($id);

            if(file_exists(public_path($staff->image_path))){
                unlink(public_path($staff->image_path));
            }

            $image = $request->file('file');
            $input['file'] = 'staff_'.date('Y')."_".time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/uploads');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['file']);
    
            $staff->update(
                [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'position' => $request['position'],
                    'contact' => $request['contact'],
                    'is_staff_or_board' => $request['is_staff_or_board'],
                    'whatsapp_address' => $request['whatsapp'],
                    'facebook_address' => $request['facebook'],
                    'twitter_address' => $request['twitter'],
                    'instagram_address' => $request['instagram'],
                    'linkedin_address' => $request['linked_in'],
                    'image_path' => 'uploads/'.$input['file'],
                    'updated_by' => get_logged_in_user_id(),
            ]);
        }

        else {
            Staff::find($id)->update(
                [
                    'name' => $request['name'],
                    'description' => $request['description'],
                    'position' => $request['position'],
                    'contact' => $request['contact'],
                    'is_staff_or_board' => $request['is_staff_or_board'],
                    'whatsapp_address' => $request['whatsapp'],
                    'facebook_address' => $request['facebook'],
                    'twitter_address' => $request['twitter'],
                    'instagram_address' => $request['instagram'],
                    'linkedin_address' => $request['linked_in'],
                    'updated_by' => get_logged_in_user_id(),
            ]);
        }

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
