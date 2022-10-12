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
        <h1>バグ報告一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "create">
            <a href="/bugs/create">バグ報告作成</a>
        </p>
        <div class='bugs'>
            @foreach ($bugs as $bug)
                <div class='bug'>
                    <h2 class='users'>
                        <a href="/mypage/{{ $bug->user->id }}">{{ $bug->user->name }}</a>
                    </h2>
                    <h2 class='title'>
                        <a href="/bugs/{{ $bug->id }}">{{ $bug->title }}</a>
                    </h2>
                    <p class='game'>
                        <a href="/games/{{ $bug->game->id }}">{{ $bug->game->name}}</a>
                    </p>
                    <p class='body'>{{ $bug->body }}</p>
                    <p class='updated_at'>{{ $bug->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $bugs->links() }}
        </div>
        
    </body>
</html>
