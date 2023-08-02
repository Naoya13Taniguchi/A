<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   public function index(Post $post)
   {
    return view('posts.index')->with(['posts' => $post->getPaginateBylimit(1)]);
    // blade内で使う変数'posts'と設定。
   }
}
?>
