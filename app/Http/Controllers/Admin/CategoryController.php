<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function Index()
    {
        $category=Category::all();
        return view('admin.category.index',['category'=>$category]);
    } //End Method

    public function Create()
    {
        return view('admin.category.create');
    } // End Method

    public function Store(CategoryFormRequest $request)
    {

        // Validate the incoming request data
        $data = $request->validated();

        // Create a new Category instance
        $category = new Category;

        // Assign the validated data to the Category attributes
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        // Handle image upload
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/uploads/category/', $filename);
            $category->image = $filename;
        }
        // Assign other attributes from the validated data
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = optional($data)['navbar_status'] ?? 0;
        $category->status = optional($data)['status'] ?? 0;

        // Assign the user ID who created this category
        $category->created_by = Auth::guard('admin')->user()->id;
        $category->save();

        return redirect()->route('admin.view_category')->with('error', 'Category Added Successfully');
    }
}
