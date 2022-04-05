@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Forest</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Forest</h1>
        <div class='username'>{{Auth::user()->name}}</div>
        <a href='/posts/create'>create</a>
        <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <h2 class='user_name'>
                    <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>
                </h2>
                <p class='body'>
                    {{ $post->body }}
                    @if($post->likes->count() >= 2)
                        <p>いいねが多いね</p>
                    @endif
                </p>
            </div>
            @if($like->where('post_id', $post->id)->first())
            <!-- 「いいね」取消用ボタンを表示 -->
	            <a href="/likes/unlike/{{ $post->id }}" class="btn btn-success btn-sm">
		            いいねを取り消す
		    <!-- 「いいね」の数を表示 -->
		            <span class="badge">
			            {{ $post->likes->where('kind_id', 1)->count() }}
		            </span>
	            </a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	            <a href="/likes/like/{{ $post->id }}" class="btn btn-secondary btn-sm">
		            いいね
		    <!-- 「いいね」の数を表示 -->
		            <span class="badge">
			            {{ $post->likes->where('kind_id', 1)->count() }}
		            </span>
	             </a>
            @endif
            @if($smart->where('post_id', $post->id)->first())
            <!-- 「スマート」取消用ボタンを表示 -->
	            <a href="/likes/unsmart/{{ $post->id }}" class="btn btn-success btn-sm">
		            スマートを取り消す
		    <!-- 「スマート」の数を表示 -->
		            <span class="badge">
			            {{ $post->likes->where('kind_id', 2)->count() }}
		            </span>
	            </a>
            @else
            <!-- まだユーザーが「スマート」をしていなければ、「スマート」ボタンを表示 -->
	            <a href="/likes/smart/{{ $post->id }}" class="btn btn-secondary btn-sm">
		            スマート
		    <!-- 「スマート」の数を表示 -->
		            <span class="badge">
			            {{ $post->likes->where('kind_id', 2)->count() }}
		            </span>
	             </a>
            @endif
        @endforeach
        </div>
        <a href='/posts/create'>create</a>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection