<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Forest</title>
    </head>
    <body>
        <h1>Forest</h1>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <form action="/replies/{{ $post->id }}" method="POST">
            @csrf
            <div class="body">
                <h2>Body</h2>
                <textarea name="reply[body]" placeholder="内容を入力">{{ old('reply.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('reply.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>