<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/articles/{slug}', function ($slug) {
    $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
    return view('article')->with(['article' => $article]);
});

Route::get('/categories/{slug}', function ($slug) {
    $category = \App\Models\Category::where('slug', $slug)->firstOrFail();
    $articles = $category->articles()->paginate(15);
    return view('category')->with(['category' => $category, 'articles' => $articles]);
});

Route::get('/{slug}', function ($slug) {
    $article = \App\Models\Page::where('slug', $slug)->firstOrFail();
    return view('page')->with(['page' => $page]);
});