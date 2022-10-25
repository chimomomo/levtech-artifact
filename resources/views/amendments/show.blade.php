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
        <h1>>修正案詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/amendments">修正案一覧へ</a>
        </p>
         <p class = "create">
            <a href="/amendments/create">修正案作成</a>
        </p>
        <form action="/amendments/{{ $amendment->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='amendments'>
            <div class='amendment'>
                <img src="{{ asset($amendment->user->image_name) }}" width="100" height="100">
                <h2 class='users'>
                    <a href="/mypage/{{ $amendment->user->id }}">{{ $amendment->user->name }}</a>
                </h2>
                <h2 class='title'>
                    <a href="/amendments/{{ $amendment->id }}">{{ $amendment->title }}</a>
                </h2>
                <p class='game'>
                    <a href="/games/{{ $amendment->game->id }}">{{ $amendment->game->name}}</a>
                </p>
                <p class='body'>{{ $amendment->body }}</p>
                @if($amendment->image_name != null)
                    <img src="{{ asset($amendment->image_name) }}" width="100" height="100">
                @endif
                <p class='updated_at'>{{ $amendment->updated_at}}</p>
                <div class = 'like'>
                @if($amendment->is_amendment_liked_by_auth_user())
                    <a href="{{ route('amendment.unlike', ['id' => $amendment->id]) }}" >いいね！<span class="badge">{{ $amendment->amendmentlikes->count() }}</span></a>
                @else
                    <a href="{{ route('amendment.like', ['id' => $amendment->id]) }}" >いいね！<span class="badge">{{ $amendment->amendmentlikes->count() }}</span></a>
                @endif
            </div>
            </div>
        </div>
        @if(Auth::user()->id == $amendment->user->id )
        <p class = "edit">
            <a href="/amendments/{{ $amendment->id }}/edit">修正案編集</a>
        </p>
        @endif
        
        <form action="/amendments/{{ $amendment->id }}/amendmentcomments" method="POST">
            @csrf
            <div class="amendment">
                <input type="hidden" name="amendment_id" value="{{ $amendment->id }}"/>
            </div>
            <div class="user">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="comment">
                <h2>投稿内容</h2>
                <textarea name="amendmentcomment" placeholder="内容">{{ old('amendment.amendmentcomment.comment') }}</textarea>
                <p class="comment__error" style="color:red">{{ $errors->first('amendment.amendmentcomment.comment') }}</p>
            <input type="submit" value="保存"/>
        </form>
        
        <div class='amendmentcomments'>
            @foreach ($amendment->amendmentcomments as $comment)
                <div class='amendmentcomment'>
                    <img src="{{ asset($comment->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                    </h2>
                    <p class='comment'>{{ $comment->comment }}</p>
                    <p class='updated_at'>{{ $comment->updated_at}}</p>
    
                    @if(Auth::user()->id == $comment->user->id )
                        <form action="/amendments/amendmentcomments/{{ $comment->id }}" id="form_comment_delete" method="post">
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
                document.getElementById('form_delete').submit() ;
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
