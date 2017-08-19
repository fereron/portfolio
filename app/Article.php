<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $slug
 * @property string $status
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUserId($value)
 * @mixin \Eloquent
 * @property int $cat_id
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCatId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article latest()
 * @method static \Illuminate\Database\Query\Builder|\App\Article published()
 * @property string $image
 * @property-read \App\Category $category
 * @property-read mixed $image_url
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereImage($value)
 */
class Article extends Model
{
    const IMAGE_PATH = '/images/articles/';

    protected $table = 'articles';

    protected $fillable = [
        'title', 'text', 'status', 'user_id', 'cat_id'
    ];

    public function scopeLatest(Builder $builder)
    {
        return $builder->orderByDesc('id');
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('status', 'Published');
    }


    public function getImageUrlAttribute()
    {
        return static::IMAGE_PATH . $this->image;
    }




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
