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
     <body　class="antialiased">
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name=post[title] placeholder="title" value="{{  old('post.title')}}"/>
                <p class='title__error' style="color:red">{{ $errors->first('post.title') }} </p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="You did good jobs!!">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red"> {{ $errors->first('post.body')}} </p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="store">
        </div>
        </form>
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>   
    
</html>