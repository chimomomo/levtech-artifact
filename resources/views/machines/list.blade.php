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
        <h1>ゲーム機種一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <div class='machines'>
            @foreach ($machines as $machine)
                <div class='machine'>
                    <h2 class='name'>
                        <a href="/machines/{{ $machine->id }}">{{ $machine->name }}</a>
                    </h2>
                </div>
            @endforeach
        </div>
    </body>
</html>
