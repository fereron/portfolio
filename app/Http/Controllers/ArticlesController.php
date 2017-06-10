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
        $articles = Article::published()->latest()->paginate(20);
//        dd($articles);
        $categories = Category::all();

        return view('posts', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    public function article($id)
    {
        dd($id);


    }

}
