<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿の詳細') }}
        </h2>
    </x-slot>
     <h1>暇人の募る場所</h1>
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
        <div>
             <a href='/user/{{ $post->user->id}}'><small>投稿者：{{ $post->user->name }}</small></a>
        </div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>