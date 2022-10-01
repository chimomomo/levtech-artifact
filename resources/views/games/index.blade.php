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
        <h1>トップページ</h1>
        <p class = "show">
            <a href="/games/show">ゲーム名(詳細)</a>
        </p>
         <p class = "company">
            <a href="/companylist">会社名一覧</a>
        </p>
        <p class = "model">
            <a href="/modellist">機種一覧</a>
        </p>
        <p class = "genre">
            <a href="/genrelist">ゲームジャンル一覧</a>
        </p>
        <p class = "review">
            <a href="/reviews">レビュー一覧</a>
        </p>
         <p class = "post">
            <a href="/posts">投稿一覧</a>
        </p>
         <p class = "recruit">
            <a href="/recruits">募集一覧</a>
        </p>
         <p class = "bug">
            <a href="/bugs">バグ報告一覧</a>
        </p>
        <p class = "amendment">
            <a href="/amendments">修正案一覧</a>
        </p>
        <p class = "mypage">
            <a href="/mypage">マイページ</a>
        </p>
        <p class = "friend">
            <a href="/friends">フレンド一覧</a>
        </p>
        <p class = "group">
            <a href="/groups">グループ一覧</a>
        </p>
    </body>
</html>
