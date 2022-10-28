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
        <h1>>マイページ編集</h1>
        <p class = "top">
            <a href="/">トップページへ</a>
        </p>
         <p class = "back">
            <a href="/mypage/{{ $user->id }}">マイページへ</a>
        </p>
        <form action="/mypage/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="image">
                <h2>プロフィール画像</h2>
                <input type="file" name="image">
            </div>
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="user[name]" placeholder="名前"　value="{{ $user->name }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
            </div>
            <div class="age">
                <h2>年齢</h2>
                <input type="text" name="user[age]" placeholder="年齢(整数)"　value="{{ $user->age }}"/>
            </div>
            <div class="sex">
                <h2>性別</h2>
                <input type="text" name="user[sex]" placeholder="性別"　value="{{ $user->sex }}"/>
            </div>
            <div class="comment">
                <h2>コメント</h2>
                <textarea name="user[comment]" placeholder="内容">{{ $user->comment }}</textarea>
            </div>
            <div class="discord__url">
                <h2>discordの招待URL</h2>
                <textarea name="url" placeholder="discordの招待URL">{{ $user->discord_url }}</textarea>
            </div>
            <div class="discord__deadline">
                <h2>discordの招待URLの期限</h2>
                <select name="user[discord_deadline]">
                    <option value="URLなし">URLなし</option>
                    <option value="30分">30分</option>
                    <option value="1時間">1時間</option>
                    <option value="6時間">6時間</option>
                    <option value="12時間">12時間</option>
                    <option value="1日">1日</option>
                    <option value="7日">7日</option>
                    <option value="期限なし">期限なし</option>
                </select>
            </div>
            <input type="submit" value="更新"/>
        </form>
    </body>
</html>
