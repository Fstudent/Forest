<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Like;

class LikeController extends Controller
{
    public function like(Post $post, Request $request){
        $like=New Like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->kind_id= 1;
        $like->save();
        return back();
    }//
    public function unlike(Post $post, Request $request){
        $user=Auth::user()->id;
        $like=Like::where('post_id', $post->id)->where('user_id', $user)->where('kind_id', 1)->first();
        $like->delete();
        return back();
    }
    public function smart(Post $post, Request $request){
        $like=New Like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->kind_id= 2;
        $like->save();
        return back();
    }//
    public function unsmart(Post $post, Request $request){
        $user=Auth::user()->id;
        $like=Like::where('post_id', $post->id)->where('user_id', $user)->where('kind_id', 2)->first();
        $like->delete();
        return back();
    }
}
