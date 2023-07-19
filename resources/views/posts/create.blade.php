<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
   <h1>暇人の募る場所</h1>
      <form action="/posts" method="POST">
        @csrf
        <div class="title">
          <h2>Title</h2>
          <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
          @if ($errors->has('post.title'))
          <p class="error_message" style="color: red;">{{ $errors->first('post.title') }}</p>
          @endif
        </div>
        <div class="body">
          <h2>Body</h2>
          <textarea name="post[body]" placeholder="投稿内容を入力してください。" value="{{ old('post.body') }}"></textarea>
          @if ($errors->has('post.body'))
          <p class="error_message" style="color: red;">{{ $errors->first('post.body') }}</p>
          @endif
        </div>
        <div class="category">
          <h2>Category</h2>
          <select name="post[category_id]">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="POST"/>
      </form>
      <div class="footer">
        <a href="/">戻る</a>
      </div>
</x-app-layout>