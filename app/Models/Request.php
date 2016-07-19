<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

    protected $table = 'request';

    protected $fillable = ['name', 'email', 'tel', 'message'];
}
