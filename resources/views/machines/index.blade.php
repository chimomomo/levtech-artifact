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
        <h1>
            {{ $machinename }}のゲーム一覧 
        </h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "model">
            <a href="/machinelist">ゲーム機種一覧へ</a>
        </p>
        <div class='games'>
            @foreach ($games as $game)
                <div class='game'>
                    <h2 class='title'>
                        <a href="/games/{{ $game->id }}">{{ $game->name }}</a>
                    </h2>
                    <img src="{{ asset('images/' . $game->image_name) }}" width="100" height="100">
                    <p class='comment'>{{ $game->comment}}</p>
                    <p class='company'>
                        <a href="/companies/{{ $game->company->id }}">{{ $game->company->name}}</a>
                    </p>
                    <p class='genre'>
                        <a href="/genres/{{ $game->genre->id }}">{{ $game->genre->name}}</a>
                    </p>
                    <p class='machine'>
                        @foreach($game->machines as $machine)
                            <a href="/machines/{{ $machine->id }}">{{ $machine->name}}</a>
                        @endforeach
                    </p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $games->links() }}
       </div>
    </body>
</html>
