<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function category($alias)
    {
        $category = Category::whereAlias($alias)->first();
        $articles = Article::whereCatId($category->id)->published()->latest()->get();
//        dd($articles);
        $categories = Category::all();

        return view('posts', [
            'categories' => $categories,
            'articles' => $articles,
        ]);
    }

}
