<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
