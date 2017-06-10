<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Observers\ArticlesObserver;
use app\Observers\CategoryObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Article::observe(ArticlesObserver::class);
        Category::creating(function (Category $category) {
            $category->alias = Str::slug($category->title);
            $category->title = Str::ucfirst($category->title);
        });
    }
}
