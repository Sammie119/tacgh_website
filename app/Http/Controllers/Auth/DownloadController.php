<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Support\Facades\Validator;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $download = Download::orderBy('name')->get();
        return view('auth.downloads.index', ['downloads' => $download]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'type' => ['required'],
            'file' => ['required', 'mimes:doc,docx,pdf', 'distinct','max:2048'],
        ])->validate();

        $fileName = date('Y')."_".time().'.'.$request->file->getClientOriginalExtension();
        $file_ext = $request->file->getClientOriginalExtension();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Download::firstOrCreate(
            [
                'name' => $request['name'],
                'type' => $request['type'],
            ],
            [
                'description' => $request['description'],
                'path' => '/app/public/'.$filePath,
                'file_ext' => $file_ext,
                'created_by' => get_logged_in_user_id(),
                'updated_by' => get_logged_in_user_id(),
            ]
        );

         return redirect('my_uploads')->with('success', 'File uploaded Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Download::find($id);

        if(file_exists(storage_path($asset->path))){
            unlink(storage_path($asset->path));
        }

        $asset->delete();

        return redirect('my_uploads')->with('success','File Deleted successfully');
    }
}
