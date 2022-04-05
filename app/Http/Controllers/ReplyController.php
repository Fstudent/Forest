<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Reply;
use App\Http\Requests\ReplyRequest;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function reply(Post $post)
    {
        return view('forest/reply')->with(['post' => $post]);
    }
    public function store(ReplyRequest $request, Reply $reply, Post $post)
    {
        $input = $request['reply'];
        $reply->user_id = Auth::id();
        $reply->post_id = $post->id;
        $reply->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }//
}
