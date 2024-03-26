<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ServicePage::all();
        return view('auth.services_page.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.services_page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            // 'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        ServicePage::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'description' => $request['description'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('my_service')->with('success','Service Created successfully');
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
        $service = ServicePage::find($id);
        return view('auth.services_page.create', ['service' => $service]);
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
            // 'file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ])->validate();

        $service = ServicePage::find($id);

        $service->update([
            'name' => $request['name'],
            'title' => $request['title'],
            'description' => $request['description'],
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('my_service')->with('success','Service Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = ServicePage::find($id);

        // $this->delete_asset_image($service->asset_id);

        $service->delete();

        return redirect('my_service')->with('success','Service Deleted successfully');
    }
}
