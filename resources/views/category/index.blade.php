<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <x-app-layout>
   <x-slot name="header">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
   </x-slot>
    <body　class="antialiased">
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
              <div class='post'>
                  <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title}}</h2></a>
                  <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                  <p class='body'>{{ $post->body }}</p>
              </div>
            @endforeach  
        </div>
        <div class='paginate'>{{$posts->links()}}</div>
    </body>
   </x-app-layout>
</html>