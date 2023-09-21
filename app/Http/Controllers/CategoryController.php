<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class CategoryController extends Controller
{
   public function index(Category $category)
   {
    return view('categories.index')->with(['posts' => $category->getByCategory()]);
    // blade内で使う変数'posts'と設定。
   }
   
   
   
   public function show(Post $post)
   {
       return view('posts/show')->with(['post' => $post]);
   }
   
   public function create(Category $category)
   {
       return view('posts.create')->with(['categories' => $category->get()]);
   }
   
   public function store( PostRequest $request, Post $post)
   {
       $input = $request['post'];
       $post->fill($input)->save();
       return redirect('/posts/'. $post->id);
   }
   
   public function edit(Post $post)
   {
       return view('posts/edit')->with(['post'=> $post]);
   }
   
   public function update(PostRequest $request,Post $post)
   {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/'. $post->id);
   }
}
?>