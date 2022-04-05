<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forest</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="username">
            {{ $user->name }}
        </h1>
        @if($follow->where('followed_id', $user->id)->first())
            <!-- 「フォロー」取消用ボタンを表示 -->
	        <a href="/users/{{ $user->id }}/unfollow">
		        followを取り消す
	        </a>
        @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	        <a href="/users/{{ $user->id }}/follow">
	            follow
	        </a>
        @endif
        
        <div class="relation">
            <!-- 「フォロー」の数を表示 -->
            
            <p>follow{{ $countfollow }}</p>
            <!-- 「フォロード」の数を表示 -->
            <p>follower{{ $countfollowed }}</p>
        </div>
        <div class="posts">
            @foreach($posts as $post)
                <h2 class="title">
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>    
                <p>{{ $post->body }}</p>
                <a href="/posts/{{ $post->id }}/reply">reply</a>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
