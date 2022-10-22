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
        <h1>募集一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "create">
            <a href="/recruits/create">募集作成</a>
        </p>
        <div class='search'>
            <form action="/recruits" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class='recruits'>
            @foreach ($recruits as $recruit)
                <div class='recruit'>
                    <img src="{{ asset($recruit->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $recruit->user->id }}">{{ $recruit->user->name }}</a>
                    </h2>
                    <h2 class='title'>
                        <a href="/recruits/{{ $recruit->id }}">{{ $recruit->title }}</a>
                    </h2>
                    <p class='game'>
                        <a href="/games/{{ $recruit->game->id }}">{{ $recruit->game->name}}</a>
                    </p>
                    <p class='body'>{{ $recruit->body }}</p>
                    @if($recruit->image_name != null)
                        <img src="{{ asset($recruit->image_name) }}" width="100" height="100">
                    @endif
                    <p class='updated_at'>{{ $recruit->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $recruits->links() }}
        </div>
        
    </body>
</html>
