<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    
    <body>
        <h1>Blog Name</h1>
        <form action="/threads" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="thread[title]" placeholder="タイトル" value="{{ old('thread.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('thread.title') }}</p>
            </div>
            <div class="discription">
                <h2>Body</h2>
                <textarea name="thread[discription]" placeholder="内容">{{ old('thread.discription') }}</textarea>
                <p class="discription__error" style="color:red">{{ $errors->first('thread.discription') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class=footer>
            <a href="/">戻る</a>
        </div>
    </body>
</html>