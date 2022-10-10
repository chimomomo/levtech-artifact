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
        <h1>バグ報告編集</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/bugs">バグ報告一覧へ</a>
        </p>
        <form action="/bugs/{{ $bug->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>バグ投稿タイトル</h2>
                <input type="text" name="bug[title]" placeholder="タイトル"　value="{{ $bug->title }}"/>
            </div>
            <div class="user">
                <input type="hidden" name="bug[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="game">
                <h2>ゲーム名</h2>
                <select name="bug[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <h2>バグ投稿内容</h2>
                <textarea name="bug[body]" placeholder="内容">{{ $bug->body }}</textarea>
            </div>
            <input type="submit" value="更新"/>
        </form>
    </body>
</html>
