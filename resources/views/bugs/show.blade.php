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
        <h1>>バグ報告詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/bugs">バグ報告一覧へ</a>
        </p>
         <p class = "create">
            <a href="/bugs/create">バグ報告作成</a>
        </p>
        <form action="/bugs/{{ $bug->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='bugs'>
            <div class='bug'>
                <img src="{{ asset($bug->user->image_name) }}" width="100" height="100">
                <h2 class='users'>
                    <a href="/mypage/{{ $bug->user->id }}">{{ $bug->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/bugs/{{ $bug->id }}">{{ $bug->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $bug->game->id }}">{{ $bug->game->name}}</a>
                </p>
                <p class='body'>{{ $bug->body }}</p>
                @if($bug->image_name != null)
                    <img src="{{ asset($bug->image_name) }}" width="100" height="100">
                @endif
                @if($bug->video_name != null)
                    <video src="{{ asset($bug->video_name) }}" width="300" height="300" controls>
                @endif
                <p class='updated_at'>{{ $bug->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $bug->user->id )
        <p class = "edit">
            <a href="/bugs/{{ $bug->id }}/edit">バグ投稿編集</a>
        </p>
        @endif
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
