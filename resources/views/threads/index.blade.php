<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>掲示板</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .thread-box {
                border: 1px solid ;
                margin-bottom: 20px;
                padding: 10px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <!--ログイン-->
        <header class="posts mt-4 mb-4">
            <h1>Blog Name</h1>
            <a href="{{ route('login') }}" class="btn btn-primary">ログイン</a>
        </header>
        <!--検索-->
        <div class="input-group mt-4 mb-4">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">検索</button>
            </div>
        </div>

        <!-- スレッドリスト -->
        <div class='threads'>
            @foreach ($threads as $thread)
            <div class="thread-box">
                <a href="/threads/{{ $thread->id}}"><h5 class='title'>{{ $thread->title }}</h5></a>
                <small>ユーザー名 = 月・日</small>
                <p class='body'>{{ $thread->body }}</p>
                <a href="{{ route('threads.show', $thread->id) }}">詳細を見る</a>
                <form action="/threads/{{ $thread->id }}" id="form_{{ $thread->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $thread->id }})">delete</button> 
                </form>
            </div>
            @endforeach
        </div>
        <!-- ページネーション -->
        <div class='paginate'>
            {{ $threads->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        
        <!--スレッド投稿-->
        <a href='/threads/create'>スレッドを立てる</a>

    </body>
</html>