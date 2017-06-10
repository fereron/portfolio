<?php

namespace App\Observers;

use App\Article;
use Illuminate\Support\Str;

class ArticlesObserver
{

   public function creating(Article $article)
   {
        $article->slug = Str::slug($article->title) .'-'. ($this->getLastId() + 1);
   }

   private function getLastId()
   {
       return Article::orderBy('id', 'desc')->first()->id ?? 0;
   }


}