<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Minus
 * @package App
 * Bind("minus")
 */
class Minus extends Model
{
    protected $table = 'minus';

    protected $fillable = ['amount'];

    public $timestamps = false;
}
