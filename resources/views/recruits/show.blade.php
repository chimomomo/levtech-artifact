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
        <h1>募集詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/recruits">募集一覧へ</a>
        </p>
         <p class = "create">
            <a href="/recruits/create">募集作成</a>
        </p>
        <form action="/recruits/{{ $recruit->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='recruits'>
            <div class='recruit'>
                <h2 class='users'>
                    <img src="{{ asset($recruit->user->image_name) }}" width="100" height="100">
                    <a href="/mypage/{{ $recruit->user->id }}">{{ $recruit->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/recruits/{{ $recruit->id }}">{{ $recruit->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $recruit->game->id }}">{{ $recruit->game->name}}</a>
                </p>
                <p class='body'>{{ $recruit->body }}</p>
                <p class='updated_at'>{{ $recruit->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $recruit->user->id )
        <p class = "edit">
            <a href="/recruits/{{ $recruit->id }}/edit">募集編集</a>
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
