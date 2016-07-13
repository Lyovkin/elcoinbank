<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePurchase extends Model
{
    protected $table = 'type_purchases';

    protected $fillable = ['name'];

    public $timestamps = false;
}
