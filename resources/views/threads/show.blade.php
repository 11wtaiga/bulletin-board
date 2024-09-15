<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1 class="title">
            {{ $thread->title }}
        </h1>
        <div class="content">
            <div class="content_post">
                <h3>本文</h3>
                <p class='body'>{{ $thread->body }}</p>    
            </div>
        </div>
        @foreach ($replies as $reply)
        <p>{{ $reply->user->name}}</p>
        <p class='reply'>{{ $reply->reply }}</p> 
        @endforeach
        
        
        <div class="edit">
            <a href="/threads/{{ $thread->id }}/edit">edit</a>
        </div>
        
        <form action="/replys" method="POST">
            @csrf
            <div class="discription">
                <h2>Body</h2>
                <textarea name="reply[reply]" placeholder="内容">{{ old('reply.discription') }}</textarea>
                <p class="discription__error" style="color:red">{{ $errors->first('reply.discription') }}</p>
            </div>
            <input type="hidden" name="reply[thread_id]" value="{{ $thread->id }}" />
            <input type="submit" value="保存"/>
        </form>
        
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $thread->id }})">delete</button> 
        </form>
    </body>
</html>