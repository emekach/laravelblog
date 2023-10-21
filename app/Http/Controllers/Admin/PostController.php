<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index', ['post' => $post]);
    } // ENd Method

    public function create()
    {
        $category = Category::where('status', '0')->get();

        return view('admin.post.create', ['category' => $category]);
    } // End Method

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = new Post;

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');

            $validExtension = ['jpg', 'png', 'jpeg'];
            $maxFileSize = 2048;

            if (!$file->isValid()) {
                return redirect()->back()->with('error', 'Invalid File');
            }

            $extension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $validExtension)) {
                return redirect()->back()->with('error', 'Invalid File extension');
            }

            if ($file->getSize() > $maxFileSize * 1024) {
                return redirect()->back()->with('error', 'File Size is too large');
            }

            $filename = time() . '.' . $extension;
            $file->move('admin/uploads/articles/', $filename);

            $post->image = $filename;
        }
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::guard('admin')->user()->id;

        $post->save();

        return redirect()->route('admin.view_post')->with('error', 'Post Added successfully');
    } // End Method

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $category = Category::where('status', '0')->get();

        return view('admin.post.edit', [
            'post' => $post,
            'category' => $category
        ]);
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();
        $post = Post::find($post_id);

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');

            $validExtension = ['jpg', 'png', 'jpeg'];
            $maxFileSize = 2048;

            if (!$file->isValid()) {
                // Handle the case where the file is not valid (e.g., corrupted)
                return redirect()->back()->with('error', 'Invalid file');
            }

            $extension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $validExtension)) {

                return redirect()->back()->with('error', 'Invalid File Extension');
            }

            if ($file->getSize() > $maxFileSize * 1024) {

                return redirect()->back()->with('error', 'File size is too large');
            }

            $filename = time() . '.' . $extension;
            $file->move('admin/uploads/articles/', $filename);
            $post->image->$filename;
        }

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::guard('admin')->user()->id;

        $post->update();

        return redirect()->route('admin.view_post')->with('error', 'Post Updated successfully');
    } // End Method

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if ($post) {
            $destination = 'admin/uploads/articles/' . $post->image;
            if (File::exists($destination)) {
                if (File::delete($destination)) {
                    $post->delete();
                    return redirect()->route('admin.view_post')->with('error', 'Post deleted successful');
                } else {
                    return redirect()->route('admin.view_post')->with('error', 'Failed to delete the file');
                }
            } else {
                return redirect()->route('admin.view_post')->with('error', 'File not found');
            }
        } else {
            return redirect()->route('admin.view_post')->with('error', 'No Post Id found');
        }
    }
}
