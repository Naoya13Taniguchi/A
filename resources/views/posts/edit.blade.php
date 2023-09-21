<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <x-slot name="header">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      </head>
    </x-slot>
      <body　class="edit">
       <h1 class="title">編集画面</h1>
       <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="content__title">
            <h2>本文</h2>            
                <input type="text" name='post[title]'  value="{{  $post->title }}"/>
            </div>
            <div class="content__body">
                <h2>本文</h2>
                <input type="text" name='post[body]'  value="{{  $post->body }}"/>
            </div>
            <input type="submit" value="update">
        </form>
        </div>
        <div class='footer'>
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
     </body>
</x-app-layout>
</html>