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
        <h1>ゲームの詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "review">
            <a href="/games/reviews/{{ $game->id }}">{{ $game->name }}のレビュー一覧</a>
        </p>
        <h2 class="title">
            {{ $game->name }}
        </h2>
        <div class="content">
            <div class="content_game">
                <p>{{ $game->comment }}</p>
                <p>{{ $game->release_date }}</p>
                <p class='company'>{{ $game->company->name}}</p>
                <p class='genre'>{{ $game->genre->name}}</p>
                <p class='machine'>
                    @foreach($game->machines as $machine)
                        {{ $machine->name}}
                    @endforeach
                </p>
                <p>{{ $game->updated_at }}</p>
            </div>
        </div>
    </body>
</html>
