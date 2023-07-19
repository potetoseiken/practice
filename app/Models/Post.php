<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    //論理削除宣言
    use SoftDeletes;
    //$fillableの記述
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        ];
        
    //categoryテーブルへのリレーション宣言
    public function category() {
    return $this->belongsTo(Category::class);
    }
    
    //Usersテーブルへのリレーション宣言
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
    
    public function getPaginateBylimit(int $limit_count = 5) {
        // updated_atで降順に並び替えた後、件数を5件に制限した。
        return $this::with(['category','user'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}
