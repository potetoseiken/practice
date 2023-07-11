<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //ホームページの表示
    public function index(Post $post) {
        return view('posts.index') -> with(['posts' => $post->getPaginateBylimit()]);
    }
    
    //全投稿表示画面の表示
    public function show(Post $post) {
        return view('posts.show') -> with(['post' => $post]);
    }
    
    //投稿入力画面の表示
    public function create() {
        return view('posts.create');
    }
    
    //DBへの投稿内容データ送信および、新規投稿詳細画面へのリダイレクト処理
    public function store(PostRequest $request, Post $post) {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }
    
    //投稿内容の編集画面の表示
    public function edit(Post $post) {
        return view('posts.edit') -> with(['post' => $post]);
    }
    
    //投稿内容の変更内容をDBに送信する
    public function update(PostRequest $request, Post $post) {
        $input_post = $request['post'];
        $post ->fill($input_post)->save();
        
        return redirect('/posts/'.$post->id);
    }
    
    //投稿内容削除実効
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
