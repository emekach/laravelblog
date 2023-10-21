<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_body' => 'required|string',
            'name' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Comment area is mandatory');
        }

        $post = Post::where('slug', $request->post_slug)
            ->where('status', '0')
            ->first();
        if ($post) {
            Comments::create([
                'post_id' => $post->id,
                'name' => $request->name,
                'email' => $request->email,
                'comment_body' => $request->comment_body

            ]);

            return redirect()->back()->with('error', 'Your comment was sent successfully.');
        } else {
            return redirect()->back()->with('error', 'No such Post Found');
        }
    }
}
