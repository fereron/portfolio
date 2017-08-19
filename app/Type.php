<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Type
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Type whereName($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    protected $table = 'types';

    public $timestamps = false;
}
