<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Spare
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $brand
 * @property string $image
 * @property int $category_id
 * @property int $type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Spare whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Spare extends Model
{
    protected $table = 'spares';
}
