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
        <h1>投稿詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
        <p class = "back">
            <a href="/posts">投稿一覧へ</a>
        </p>
        <p class = "create">
            <a href="/posts/create">投稿作成</a>
        </p>
        <form action="/posts/{{ $post->id }}" id="form_post_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='posts'>
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
                    <video src="{{ asset($post->video_name) }}" width="300" height="300" controls >
                @endif
                <p class='updated_at'>{{ $post->updated_at}}</p>
            </div>
            <div class = 'like'>
                @if($post->is_post_liked_by_auth_user())
                    <a href="{{ route('post.unlike', ['id' => $post->id]) }}" >いいね！<span class="badge">{{ $post->postlikes->count() }}</span></a>
                @else
                    <a href="{{ route('post.like', ['id' => $post->id]) }}" >いいね！<span class="badge">{{ $post->postlikes->count() }}</span></a>
                @endif
            </div>
        </div>
            @if(Auth::user()->id == $post->user->id )
                <p class = "edit">
                    <a href="/posts/{{ $post->id }}/edit">投稿編集</a>
                </p>
            @endif
        </div>
        
        <form action="/posts/{{ $post->id }}/postcomments" method="POST">
            @csrf
            <div class="post">
                <input type="hidden" name="post_id" value="{{ $post->id }}"/>
            </div>
            <div class="user">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="comment">
                <h2>投稿内容</h2>
                <textarea name="postcomment" placeholder="内容">{{ old('post.postcomment.comment') }}</textarea>
                <p class="comment__error" style="color:red">{{ $errors->first('post.postcomment.comment') }}</p>
            <input type="submit" value="保存"/>
        </form>
        
        <div class='postcomments'>
            @foreach ($post->postcomments as $comment)
                <div class='postcomment'>
                    <img src="{{ asset($comment->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                    </h2>
                    <p class='comment'>{{ $comment->comment }}</p>
                    <p class='updated_at'>{{ $comment->updated_at}}</p>
    
                    @if(Auth::user()->id == $comment->user->id )
                        <form action="/posts/postcomments/{{ $comment->id }}" id="form_comment_delete" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="display:none">
                            <p class ='delete'>
                                [<span onclick="return deleteComment(event);">コメント削除</span>]
                            </p>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
        <script>
        function deletePost(e) {
            'use strict' ;
            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_post_delete').submit() ;
            }
        }
        
        function deleteComment(e) {
            'use strict' ;
            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById('form_comment_delete').submit() ;
            }
        }
        </script>
    </body>
</html>
