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
        <h1>>修正案一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "create">
            <a href="/amendments/create">修正案作成</a>
        </p>
        <div class='amendments'>
            @foreach ($amendments as $amendment)
                <div class='amendment'>
                    <h2 class='users'>
                        <a href="/amendments/{{ $amendment->user->id }}">{{ $amendment->user->name }}</a>
                    </h2>
                    <h2 class='title'>
                        <a href="/amendments/{{ $amendment->id }}">{{ $amendment->title }}</a>
                    </h2>
                    <p class='game'>
                        <a href="/games/{{ $amendment->game->id }}">{{ $amendment->game->name}}</a>
                    </p>
                    <p class='body'>{{ $amendment->body }}</p>
                    <p class='updated_at'>{{ $amendment->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $amendments->links() }}
        </div>
        
    </body>
</html>
