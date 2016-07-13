<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlansType extends Model
{
    protected $table = 'plans_types';

    protected $fillable = ['name'];

    public $timestamps = false;
}
