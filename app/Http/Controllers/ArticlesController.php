<?php

namespace App\Http\Controllers;

use App;
use App\Article;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
//        $ids = Article::all()->pluck('id')->avg();
//        $ids = Article::avg('id');
//        dd($ids);
        $articles = Article::published()->latest()->paginate(20);

        $categories = Category::all();
//        dd($articles);

        return view('posts', [
            'categories' => $categories,
            'articles' => $articles,
        ]);
    }

    public function category($categoryAlias)
    {
        $category = Category::whereAlias($categoryAlias)->first();
        $articles = Article::whereCatId($category->id)->published()->latest()->get();
        $categories = Category::all();

        return view('posts', [
            'categories' => $categories,
            'articles' => $articles,
        ]);
    }

    public function article($id)
    {
        dd($id);


    }

}
