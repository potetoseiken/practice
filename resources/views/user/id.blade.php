<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $name }}の投稿一覧
        </h2>
    </x-slot>
    <div class="posts">
        @foreach($posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <p>{{ $post->body }}</p>
                <small>{{ $post->user->name }}</small>
            </div>
        @endforeach
    </div>
</x-app-layout>