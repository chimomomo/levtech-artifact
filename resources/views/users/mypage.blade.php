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
        <h1>>マイページ一覧</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <div class='users'>
            <div class='user'>
                @if(Auth::user()->id != $user->id ) 
                    <div class = 'follow'>
                        @if ($following_users_list->contains($user->id))
                            <form action="/mypage/unfollow/{{ $user->id }}" method="POST">
                                @csrf
                                <p>フォロー中</p>
                                <button class="unfollow">フォロー解除</button>
                            </form>
                        @else
                            <form action=="/mypage/follow/{{ $user->id }}" method="POST">
                                @csrf
                                <button class="follow">フォローする</button>
                            </form>
                         @endif
                    </div>
                @endif
                <img src="{{ asset($user->image_name) }}" width="100" height="100">
                <h2 class='name'>
                   {{ $user->name }}
                </h2>
                <div class='age'>
                    <h4 class='age'>年齢</h4>
                    <p class='age'>
                        {{ $user->age }}
                    </p>
                </div>
                <div class='sex'>
                    <h4 class='sex'>性別</h4>
                    <p class='sex'>
                        {{ $user->sex }}
                    </p>
                </div>
                <p class='comment'>{{ $user->comment }}</p>
                 @if($user->discord_url != NULL && $following_users_list->contains($user->id) && $follower_users_list->contains($user->id))
                    <div class='discord'>
                        <h4 class='discord__url'>discord招待URL</h4>
                        <p class='discord__url'>
                            <a href="/mypage/discord/{{ $user->id }}">{{ $user->discord_url }}</a>
                        </p>
                        <h4 class='discord__deadline'>discord招待URLの期限</h4>
                        <p class='discord__deadline'>
                            {{ $user->discord_deadline }}
                        </p>
                    </div>
                @else
                    <p class='discord'>招待URLが設定されていないか相互フォローではありません</p>
                @endif
                <p class='updated_at'>{{ $user->updated_at}}</p>
            </div>
        </div>
        @if(Auth::user()->id == $user->id ) 
            <p class = "edit">
                <a href="/mypage/{{ $user->id }}/edit">編集</a>
            </p>
        @endif
        
        <p class = "following">
            <a href="/mypage/following/{{ $user->id }}">{{ $user->name }}のフォロー一覧</a>
        </p>
        <p class = "follower">
            <a href="/mypage/follower/{{ $user->id }}">{{ $user->name }}のフォロワー一覧</a>
        </p>
        <p class = "review">
            <a href="/mypage/reviews/{{ $user->id }}">{{ $user->name }}のレビュー一覧</a>
        </p>
        <p class = "post">
            <a href="/mypage/posts/{{ $user->id }}">{{ $user->name }}の投稿一覧</a>
        </p>
        <p class = "recruit">
            <a href="/mypage/recruits/{{ $user->id }}">{{ $user->name }}の募集一覧</a>
        </p>
        <p class = "bug">
            <a href="/mypage/bugs/{{ $user->id }}">{{ $user->name }}のバグ投稿一覧</a>
        </p>
        <p class = "amendment">
            <a href="/mypage/amendments/{{ $user->id }}">{{ $user->name }}の修正案一覧</a>
        </p> 
    </body>
</html>
