<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Percent extends Model
{
    protected $table = 'percent';

    protected $fillable = ['percent'];

    public $timestamps = false;
}
