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
        <h1>募集詳細</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/recruits">募集一覧へ</a>
        </p>
         <p class = "create">
            <a href="/recruits/create">募集作成</a>
        </p>
        <form action="/recruits/{{ $recruit->id }}" id="form_delete" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" style="display:none">
            <p class ='delete'>
                [<span onclick="return deletePost(event);">delete</span>]
            </p>
        </form>
        <div class='recruits'>
            <div class='recruit'>
                <h2 class='users'>
                    <img src="{{ asset($recruit->user->image_name) }}" width="100" height="100">
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
        </div>
        @if(Auth::user()->id == $recruit->user->id )
        <p class = "edit">
            <a href="/recruits/{{ $recruit->id }}/edit">募集編集</a>
        </p>
        @endif
        
        <form action="/recruits/{{ $recruit->id }}/recruitcomments" method="POST">
            @csrf
            <div class="recruit">
                <input type="hidden" name="recruit_id" value="{{ $recruit->id }}"/>
            </div>
            <div class="user">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="comment">
                <h2>投稿内容</h2>
                <textarea name="recruitcomment" placeholder="内容">{{ old('recruit.recruitcomment.comment') }}</textarea>
                <p class="comment__error" style="color:red">{{ $errors->first('recruit.recruitcomment.comment') }}</p>
            <input type="submit" value="保存"/>
        </form>
        
        <div class='recruitcomments'>
            @foreach ($recruit->recruitcomments as $comment)
                <div class='recruitcomment'>
                    <img src="{{ asset($comment->user->image_name) }}" width="100" height="100">
                    <h2 class='users'>
                        <a href="/mypage/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                    </h2>
                    <p class='comment'>{{ $comment->comment }}</p>
                    <p class='updated_at'>{{ $comment->updated_at}}</p>
    
                    @if(Auth::user()->id == $comment->user->id )
                        <form action="/recruits/recruitcomments/{{ $comment->id }}" id="form_comment_delete" method="post">
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
