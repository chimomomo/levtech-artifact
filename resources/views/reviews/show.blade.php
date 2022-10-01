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
        <p class = "title">レビュータイトル</p>
        <p class = "edit">
            <a href="/reviews/edit">レビュー編集</a>
        </p>
    </body>
</html>
