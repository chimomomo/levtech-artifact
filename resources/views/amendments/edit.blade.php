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
        <h1>>修正案編集</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/amendments">修正案一覧へ</a>
        </p>
        <form action="/amendments/{{ $amendment->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>修正案タイトル</h2>
                <input type="text" name="amendment[title]" placeholder="タイトル"　value="{{ $amendment->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('amendment.title') }}</p>
            </div>
            <div class="user">
                <input type="hidden" name="amendment[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="game">
                <h2>ゲーム名</h2>
                <select name="amendment[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <h2>修正案内容</h2>
                <textarea name="amendment[body]" placeholder="内容">{{ $amendment->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('amendment.body') }}</p>
            </div>
            <div class="image">
                <h2>投稿画像</h2>
                <input type="file" name="image">
            </div>
            <input type="submit" value="更新"/>
        </form>
    </body>
</html>
