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
        $slider_post= Post::where('status','0')
        ->take('5')
        ->get();
        $latest_post = Post::where('status', '0')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('frontend.index', [
            'slider_post' => $slider_post,
            'latest_post'=>$latest_post
        ]);
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
    } // End Method


    public function viewPost(string $category_slug, string $post_slug)
    {

        $category = Category::where('slug', $category_slug)
            ->where('status', '0')
            ->first();
        if ($category) {

            $post = Post::where('category_id', $category->id)
                ->where('slug', $post_slug)
                ->where('status', '0')
                ->first();

            // $latest_posts = Post::where('category_id', $category->id)
            //     ->where('status', '0')
            //     ->orderBy('created_at', 'DESC')
            //     ->get();

            return view('frontend.post.view', [
                'category' => $category,
                'post' => $post
            ]);
        } else {
            return redirect()->route('frontend.home');
        }
    }
}
