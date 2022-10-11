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
        <h1>>マイページ編集</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/mypage">マイページへ</a>
        </p>
        <form action="/mypage/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="user[name]" placeholder="名前"　value="{{ $user->name }}"/>
            </div>
            <div class="age">
                <h2>年齢</h2>
                <input type="text" name="user[age]" placeholder="年齢(整数)"　value="{{ $user->age }}"/>
            </div>
            <div class="sex">
                <h2>性別</h2>
                <input type="text" name="user[sex]" placeholder="性別"　value="{{ $user->sex }}"/>
            </div>
            <div class="comment">
                <h2>コメント</h2>
                <textarea name="user[comment]" placeholder="内容">{{ $user->comment }}</textarea>
            </div>
            <input type="submit" value="更新"/>
        </form>
    </body>
</html>
