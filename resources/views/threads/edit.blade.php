<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    
    <body>
        <h1>Blog Name</h1>
        <form action="/threads/{{ $thread->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="thread[title]" value="{{ $thread->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('thread.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <input type="text" name="thread[body]" value="{{ $thread->body }}"/>
                <p class="body__error" style="color:red">{{ $errors->first('thread.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class=footer>
            <a href="/threads/{{ $thread->id }}">戻る</a>
        </div>
    </body>
</html>