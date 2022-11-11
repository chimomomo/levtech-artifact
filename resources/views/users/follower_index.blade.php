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
        <h1>{{ $user->name }}のフォロワー一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "mypage">
            <a href="/mypage/{{ $user->id }}">{{ $user->name }}のマイページへ</a>
        </p>
        <div class='follower__users'>
            @foreach ($follower_users_list as $user)
                <div class='following__user'>
                    <img src="{{ asset($user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $user->id }}">{{ $user->name }}</a>
                    </h2>
                </div>
            @endforeach
        </div>
        
    </body>
</html>
