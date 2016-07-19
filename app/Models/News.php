<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models
 */
class News extends Model
{
    use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

    protected $table = 'news';

    protected $fillable = ['title', 'text'];
}
