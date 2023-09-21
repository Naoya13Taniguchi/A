<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Cloudinary;

class PostController extends Controller
{
   public function index(Post $post)
   {
    return view('posts.index')->with(['posts' => $post->getPaginateBylimit(5)]);
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
   
   // public function store(Request $request, Post $post)
   //  {
    //     //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
    //     $input = 
    //     $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    //     dd($image_url);  //画像のURLを画面に表示

    //     $input = $request['post'];
    //     $post->fill($input)->save();
    //     return redirect('/posts/' . $post->id);
    // }
   public function store( PostRequest $request, Post $post)
   {
      $input = $request['post'];
      $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
      $input += ['image_url' => $image_url];
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
