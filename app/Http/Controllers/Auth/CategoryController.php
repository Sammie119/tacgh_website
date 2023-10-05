<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::all();
        return view('auth.categories.index', ['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required']
        ]);
        Category::firstOrCreate([
            'name' => $request['name'],
            'description' => $request['description'],
            'created_by' => get_logged_in_user_id(),
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('/categories')->with('success', 'Category Created Successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::find($id);
        return view('auth.categories.create', ['cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            // 'id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required']
        ])->validate();

        Category::find($id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'updated_by' => get_logged_in_user_id(),
        ]);

        return redirect('/categories')->with('success', 'Category Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();

        return redirect('/categories')->with('success', 'Category Deleted Successfully!!');
    }
}
