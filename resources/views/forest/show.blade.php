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
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="replies">
            @foreach($replies as $reply)
                <p>{{ $reply->user->name }}</p>
                <p>{{ $reply->body }}</p>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
            <a href="/posts/{{ $post->id }}/reply">reply</a>
        </div>
    </body>
</html>
