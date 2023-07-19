<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category) {
        //自身のカテゴリに属する投稿を全て表示する。
        return view('categories.index')->with(['posts' => $category->getByCategory(),'category' => $category]);
    }
}
