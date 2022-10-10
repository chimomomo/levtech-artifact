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
        <h1>募集作成</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "back">
            <a href="/recruits">募集一覧へ</a>
        </p>
        <form action="/recruits" method="POST">
            @csrf
            <div class="title">
                <h2>募集タイトル</h2>
                <input type="text" name="recruit[title]" placeholder="タイトル"　value="{{ old('recruit.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('recruit.title') }}</p>
            </div>
            <div class="user">
                <input type="hidden" name="recruit[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="game">
                <h2>ゲーム名</h2>
                <select name="recruit[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <h2>募集内容</h2>
                <textarea name="recruit[body]" placeholder="内容">{{ old('recruit.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('recruit.body') }}</p>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
