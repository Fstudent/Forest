<?php

namespace App\Http\Controllers;

use Auth;
use App\Follow;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function showuser(User $user, Post $post)
    {
        $follow=Follow::where('follow_id', Auth::id())->get();
        $countfollow = Follow::where('follow_id', $user->id)->get()->count();
        $countfollowed = Follow::where('followed_id', $user->id)->get()->count();
        return view('forest/showuser', compact('follow', 'countfollow', 'countfollowed'))->with(['user' => $user, 'posts' => $user->posts]);
    }
    public function follow(User $user, Request $request){
        $follow=New Follow();
        $follow->follow_id=Auth::user()->id;
        $follow->followed_id=$user->id;
        $follow->save();
        return back();
    }//
    public function unfollow(User $user, Request $request){
        $followid=Auth::user()->id;
        $follow=Follow::where('followed_id', $user->id)->where('follow_id', $followid)->first();
        $follow->delete();
        return back();
    }//
}
