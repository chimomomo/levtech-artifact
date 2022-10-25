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
        <h1>>バグ報告詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/bugs">バグ報告一覧へ</a>
        </p>
         <p class = "create">
            <a href="/bugs/create">バグ報告作成</a>
        </p>
        <form action="/bugs/{{ $bug->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='bugs'>
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
                <div class = 'like'>
                @if($bug->is_bug_liked_by_auth_user())
                    <a href="{{ route('bug.unlike', ['id' => $bug->id]) }}" >いいね！<span class="badge">{{ $bug->buglikes->count() }}</span></a>
                @else
                    <a href="{{ route('bug.like', ['id' => $bug->id]) }}" >いいね！<span class="badge">{{ $bug->buglikes->count() }}</span></a>
                @endif
            </div>
            </div>
        </div>
        @if(Auth::user()->id == $bug->user->id )
        <p class = "edit">
            <a href="/bugs/{{ $bug->id }}/edit">バグ投稿編集</a>
        </p>
        @endif
        
        <form action="/bugs/{{ $bug->id }}/bugcomments" method="POST">
            @csrf
            <div class="bug">
                <input type="hidden" name="bug_id" value="{{ $bug->id }}"/>
            </div>
            <div class="user">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="comment">
                <h2>投稿内容</h2>
                <textarea name="bugcomment" placeholder="内容">{{ old('bug.bugcomment.comment') }}</textarea>
                <p class="comment__error" style="color:red">{{ $errors->first('bug.bugcomment.comment') }}</p>
            <input type="submit" value="保存"/>
        </form>
        
        <div class='bugcomments'>
            @foreach ($bug->bugcomments as $comment)
                <div class='bugcomment'>
                    <img src="{{ asset($comment->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                    </h2>
                    <p class='comment'>{{ $comment->comment }}</p>
                    <p class='updated_at'>{{ $comment->updated_at}}</p>
    
                    @if(Auth::user()->id == $comment->user->id )
                        <form action="/bugs/bugcomments/{{ $comment->id }}" id="form_comment_delete" method="post">
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
