<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user) {
        return view('user.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
    
    public function userIndex(User $user) {
        $posts = $user->posts()->get();
        return view('user.id')->with(['posts' => $posts,'name' => $user->name]);
    }
}
