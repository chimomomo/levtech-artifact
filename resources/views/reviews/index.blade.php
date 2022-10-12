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
        <h1>レビュー一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "create">
            <a href="/reviews/create">レビュー作成</a>
        </p>
        <div class='reviews'>
            @foreach ($reviews as $review)
                <div class='review'>
                    <img src="{{ asset($review->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $review->user->id }}">{{ $review->user->name }}</a>
                    </h2>
                    <h2 class='title'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                    </h2>
                    <p class='game'>
                        <a href="/games/{{ $review->game->id }}">{{ $review->game->name}}</a>
                    </p>
                    <p class='machine'>
                        <a href="/machines/{{ $review->machine->id }}">{{ $review->machine->name}}</a>
                    </p>
                    <p class='stars'> ☆ {{ $review->stars }}</p>
                    <p class='body'>{{ $review->body }}</p>
                    <p class='updated_at'>{{ $review->updated_at}}</p>
                </div>
            @endforeach
        </div>
        <div class = 'paginate'>
           {{ $reviews->links() }}
        </div>
    </body>
</html>
