<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Page') }}
        </h2>
    </x-slot>
    <body　class="antialiased">
        <h1>My Page</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
              <div class='post'>
                  <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title}}</h2></a>
                  <a href="">{{ $post->category->name }}</a>
                  <p class='body'>{{ $post->body }}</p>
              </div>
            @endforeach  
            <h1 class='user_name'>ログインユーザー;{{ Auth::user()->name }}</h1>
        </div>
        <div class='paginate'>{{$posts->links()}}</div>
    </body>
 </x-app-layout>
</html>