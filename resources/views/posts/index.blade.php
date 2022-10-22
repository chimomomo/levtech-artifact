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
        <h1>投稿一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "create">
            <a href="/posts/create">投稿作成</a>
        </p>
        <div class='search'>
            <form action="/posts" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </form>
        </div>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <img src="{{ asset($post->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $post->user->id }}">{{ $post->user->name }}</a>
                    </h2>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <p class='game'>
                        <a href="/games/{{ $post->game->id }}">{{ $post->game->name}}</a>
                    </p>
                    <p class='body'>{{ $post->body }}</p>
                    @if($post->image_name != null)
                        <img src="{{ asset($post->image_name) }}" width="100" height="100">
                    @endif
                    @if($post->video_name != null)
                        <video src="{{ asset($post->video_name) }}" width="300" height="300" controls>
                    @endif
                    <p class='lile'>いいね！{{ $post->postlikes->count() }}</p>
                    <p class='updated_at'>{{ $post->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $posts->links() }}
        </div>
        
    </body>
</html>
