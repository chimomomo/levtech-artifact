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
        <h1>>修正案詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/amendments">修正案一覧へ</a>
        </p>
         <p class = "create">
            <a href="/amendments/create">修正案作成</a>
        </p>
        <form action="/amendments/{{ $amendment->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='amendments'>
            <div class='amendment'>
                <img src="{{ asset($amendment->user->image_name) }}" width="100" height="100">
                <h2 class='users'>
                    <a href="/mypage/{{ $amendment->user->id }}">{{ $amendment->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/amendments/{{ $amendment->id }}">{{ $amendment->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $amendment->game->id }}">{{ $amendment->game->name}}</a>
                </p>
                <p class='body'>{{ $amendment->body }}</p>
                <p class='updated_at'>{{ $amendment->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $amendment->user->id )
        <p class = "edit">
            <a href="/amendments/{{ $amendment->id }}/edit">修正案編集</a>
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
