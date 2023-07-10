<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //$fillableの記述
    protected $fillable = [
        'title',
        'body',
        ];
    
    use HasFactory;
    
    public function getPaginateBylimit(int $limit_count = 5) {
        // updated_atで降順に並び替えた後、件数を10件に制限した。
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
