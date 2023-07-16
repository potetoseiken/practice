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
    </body>
</html>
