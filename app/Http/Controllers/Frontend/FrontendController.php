<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    } // End Method

    public function viewCategoryPost($category_slug)
    {
        $category = Category::where('slug', $category_slug)
            ->where('status', '0')
            ->first();

        if ($category) {
            $post = Post::where('category_id', $category->id)
                ->where('status', '0')
                ->paginate(2);

            $post->withPath(url('category/' . $category->slug)); // Set the path for the pagination links.


            return view('frontend.post.index', [
                'post' => $post,
                'category' => $category
            ]);
        } else {
            return redirect()->route('frontend.home');
        }
    }
}
