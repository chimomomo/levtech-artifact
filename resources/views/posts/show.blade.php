<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gaming</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <h1>投稿詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/posts">投稿一覧へ</a>
        </p>
         <p class = "create">
            <a href="/posts/create">投稿作成</a>
        </p>
        <form action="/posts/{{ $post->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='posts'>
            <div class='post'>
                <h2 class='users'>
                    <a href="/posts/{{ $post->user->id }}">{{ $post->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $post->game->id }}">{{ $post->game->name}}</a>
                </p>
                <p class='body'>{{ $post->body }}</p>
                <p class='updated_at'>{{ $post->updated_at}}</p>
            </div>
        </div>
        <p class = "edit">
            <a href="/posts/{{ $post->id }}/edit">投稿編集</a>
        </p>
        <script>
        function deletePost(e) {
            'use strict' ;
            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_delete').submit() ;
            }
        }
        </script>
    </body>
</html>
