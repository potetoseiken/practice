<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller
{
    //ホームページの表示
    public function index(Post $post) {
        //クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();
        
        //GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';
        //リクエスト送信と返却データの取得
        //Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client -> request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
            );
            
        //API通信で取得したデータはjson形式なのでPHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        //index bladeにデータを渡す
        return view('posts.index')-> with([
            'posts' => $post->getPaginateBylimit(),
            'questions' => $questions['questions'],
            ]);
    }
    
    //全投稿表示画面の表示
    public function show(Post $post) {
        return view('posts.show') -> with(['post' => $post]);
    }
    
    //投稿入力画面の表示
    public function create(Category $category) {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    //DBへの投稿内容データ送信および、新規投稿詳細画面へのリダイレクト処理
    public function store(PostRequest $request, Post $post) {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
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
         $input += ['user_id' => $request->user()->id];

        $post ->fill($input_post)->save();
        
        return redirect('/posts/'.$post->id);
    }
    
    //投稿内容削除実効
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
