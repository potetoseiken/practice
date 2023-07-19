<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
   <h1 class="title">投稿内容編集画面</h1>
      <div class="content">
          <form action="/posts/{{ $post->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="content_title">
                  <h2>タイトル</h2>
                  <input type='text' name='post[title]' value='{{  $post->title }}'/>
              </div>
              <div class="content_body">
                  <h2>本文</h2>
                  <input type='text' name='post[body]' value='{{ $post->body }}'/>
              </div>
              <input type='submit' value='変更を保存'/>
          </form> 
      </div>
</x-app-layout>