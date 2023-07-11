<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <h1>Blog Name</h1>
        <div class="posts">
            <div class="post">
                @foreach ($posts as $post)
                    <h2 class="title">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </h2>
                    <p class="body">{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" method="POST" id="form_{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                @endforeach
            </div>
            <div class='paginate'>{{ $posts->links() }}</div>
            <a href="/posts/create">create</a>
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
