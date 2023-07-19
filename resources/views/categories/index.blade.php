<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カテゴリーが{{ $category->name }}の投稿一覧
        </h2>
    </x-slot>
    <h1>暇人の募る場所</h1>
    <a href='/'>戻る</a>
    <div class="posts">
        <div class="post">
            @foreach ($posts as $post)
                <h2 class="title">
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                <p class="body">{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
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
</x-app-layout>