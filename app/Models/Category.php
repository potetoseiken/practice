<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;
    
    //Postとのリレーション宣言
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    //カテゴリごとに投稿を取得する
    public function getByCategory(int $limit_count = 5) {
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
