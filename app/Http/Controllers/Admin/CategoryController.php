<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\Admin\CategoryFormUpdateRequest;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function Index()
    {
        $category = Category::all();
        return view('admin.category.index', ['category' => $category]);
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
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Step 1: Validate the file
            $validExtensions = ['jpeg', 'jpg', 'png'];
            $maxFileSize = 2048; // 2MB in kilobytes

            if (!$file->isValid()) {
                // Handle the case where the file is not valid (e.g., corrupted)
                return redirect()->back()->with('error', 'Invalid file');
            }

            $extension = $file->getClientOriginalExtension();
            if (!in_array(strtolower($extension), $validExtensions)) {
                // Handle the case where the file has an invalid extension
                return redirect()->back()->with('error', 'Invalid file extension');
            }

            if ($file->getSize() > $maxFileSize * 1024) {
                // Handle the case where the file is too large
                return redirect()->back()->with('error', 'File is too large');
            }


            $filename = time() . '.' . $extension;

            $file->move('admin/uploads/category/', $filename);
            $category->image = $filename;
        }
        // Assign other attributes from the validated data
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';

        // Assign the user ID who created this category
        $category->created_by = Auth::guard('admin')->user()->id;
        $category->save();

        return redirect()->route('admin.view_category')->with('error', 'Category Added Successfully');
    }

    public function Edit($category_id)
    {
        $category = Category::find($category_id);

        return view('admin.category.edit', ['category' => $category]);
    } // End Method

    public function Update(CategoryFormUpdateRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {

            $destination = 'admin/uploads/category/' . $category->image;

            // dd($destination);

            if (File::exists($destination)) {
                File::delete($destination);
            }

            // if (Storage::disk('public')->exists($destination)) {
            //     Storage::disk('public')->delete($destination);
            // }

            $file = $request->file('image');
            $validExtensions = ['jpeg', 'png', 'jpg'];
            $maxFileSize = 2048;

            if (!$file->isValid()) {
                return redirect()->back()->with('error', 'Invalid File');
            }

            $extension = $file->getClientOriginalExtension();
            if (!in_array(strtolower($extension), $validExtensions)) {
                return redirect()->back()->with('error', 'Invalid File Extension');
            }

            if ($file->getSize() > $maxFileSize * 1024) {
                return redirect()->back()->with('error', 'File size above 2mb');
            }

            $filename = time() . '.' . $extension;
            $file->move('admin/uploads/category/', $filename);
            $category->image = $filename;
        }

        // Assign other attributes from the validated data
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';

        // Assign the user ID who created this category
        $category->created_by = Auth::guard('admin')->user()->id;
        $category->update();

        return redirect()->route('admin.view_category')->with('error', 'Category Updated Successfully');
    } // End Method

    public function Destroy($category_id)
    {
        $category = Category::find($category_id);

        if ($category) {
            $destination = 'admin/uploads/category/' . $category->image;


            if (File::exists($destination)) {
                if (File::delete($destination)) {
                    $category->posts()->delete();
                    $category->delete();

                    return redirect()->route('admin.view_category')->with('error', 'Category deleted Successfully with its posts');
                } else {
                    return redirect()->route('admin.view_category')->with('error', 'Failed to delete the file');
                }
            } else {
                return redirect()->route('admin.view_category')->with('error', 'File not found');
            }
        } else {
            return redirect()->route('admin.view_category')->with('error', 'No category Id found');
        }
    }
}
