<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OwnPosts') }}
        </h2>
    </x-slot>
    <div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <p>{{ $post->body }}</p>
                <small>{{ $post->user->name }}</small>

            </div>
        @endforeach
   
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
    </div>
</x-app-layout>