<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Post Content</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class="title">
            <h3>[タイトル]</h3>
            <p>{{ $post->title }}</p>
        </h2>
        <div class="content">
            <div class="post_content">
                <h3>[本文]</h3>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <p>この投稿の内容を編集したい場合は以下のボタンから専用画面に移行してください。</p>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
        <p>投稿一覧画面に戻る</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
