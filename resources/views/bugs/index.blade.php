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
        <div class='search'>
            <form action="/bugs" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class='bugs'>
            @foreach ($bugs as $bug)
                <div class='bug'>
                    <img src="{{ asset($bug->user->image_name) }}" width="100" height="100">
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
                    @if($bug->image_name != null)
                        <img src="{{ asset($bug->image_name) }}" width="100" height="100">
                    @endif
                    @if($bug->video_name != null)
                        <video src="{{ asset($bug->video_name) }}" width="300" height="300" controls>
                    @endif
                    <p class='updated_at'>{{ $bug->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $bugs->links() }}
        </div>
        
    </body>
</html>
