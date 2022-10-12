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
        <h1>>マイページ一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <div class='users'>
            <div class='user'>
                <h2 class='user'>
                   {{ $user->name }}
                </h2>
                <div class='age'>
                    <h4 class='age'>年齢</h4>
                    <p class='age'>
                        {{ $user->age }}
                    </p>
                </div>
                <div class='sex'>
                    <h4 class='sex'>性別</h4>
                    <p class='sex'>
                        {{ $user->sex }}
                    </p>
                </div>
                <p class='comment'>{{ $user->comment }}</p>
                <p class='updated_at'>{{ $user->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $user->id ) 
            <p class = "edit">
                <a href="/mypage/{{ $user->id }}/edit">編集</a>
            </p>
        @endif
        
        <p class = "review">
            <a href="/mypage/reviews/{{ $user->id }}">{{ $user->name }}のレビュー一覧</a>
        </p>
        <p class = "post">
            <a href="/mypage/posts/{{ $user->id }}">{{ $user->name }}の投稿一覧</a>
        </p>
        <p class = "recruit">
            <a href="/mypage/recruits/{{ $user->id }}">{{ $user->name }}の募集一覧</a>
        </p>
        <p class = "bug">
            <a href="/mypage/bugs/{{ $user->id }}">{{ $user->name }}のバグ投稿一覧</a>
        </p>
        <p class = "amendment">
            <a href="/mypage/amendments/{{ $user->id }}">{{ $user->name }}の修正案一覧</a>
        </p> 
    </body>
</html>
