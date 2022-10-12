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
        <h1>レビュー詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/reviews">レビュー一覧へ</a>
        </p>
         <p class = "create">
            <a href="/reviews/create">レビュー作成</a>
        </p>
        <form action="/reviews/{{ $review->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='reviews'>
            <div class='review'>
                <img src="{{ asset($review->user->image_name) }}" width="100" height="100">
                <h2 class='users'>
                    <a href="/mypage/{{ $review->user->id }}">{{ $review->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $review->game->id }}">{{ $review->game->name}}</a>
                </p>
                <p class='machine'>
                    <a href="/machines/{{ $review->machine->id }}">{{ $review->machine->name}}</a>
                </p>
                <p class='stars'> ☆ {{ $review->stars }}</p>
                 <p class='body'>{{ $review->body }}</p>
                <p class='updated_at'>{{ $review->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $reveiw->user->id )
        <p class = "edit">
            <a href="/reviews/{{ $review->id }}/edit">レビュー編集</a>
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
