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
        <h1>レビュー作成</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "back">
            <a href="/reviews">レビュー一覧へ</a>
        </p>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>レビュータイトル</h2>
                <input type="text" name="review[title]" placeholder="タイトル"　value="{{ old('review.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="user">
                <input type="hidden" name="review[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="game">
                <h2>ゲーム名</h2>
                <select name="review[game_id]">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="machine">
                <h2>機種名</h2>
                <select name="review[machine_id]">
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="stars">
                <h2>星</h2>
                <textarea name="review[stars]" placeholder="0～5の整数">{{ old('review.stars') }}</textarea>
                <p class="stars__error" style="color:red">{{ $errors->first('review.stars') }}</p>
            </div>
            <div class="body">
                <h2>レビュー内容</h2>
                <textarea name="review[body]" placeholder="内容">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
