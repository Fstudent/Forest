<?php

namespace App\Http\Controllers;

use App\Post;
use App\Reply;
use App\Like;
use Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $like=Like::where('user_id', Auth::id())->where('kind_id', 1)->get();
        $smart=Like::where('user_id', Auth::id())->where('kind_id', 2)->get();
        return view('forest/index', compact('like', 'smart'))->with(['posts' => $post->getPaginateByLimit()]);  
    }
    public function show(Post $post, Reply $reply)
    {
        return view('forest/show')->with(['post' => $post, 'replies' => $reply->where('post_id', $post->id)->get()]);
    }//
    public function create()
    {
        return view('forest/create');
    }
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->user_id = Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
}
