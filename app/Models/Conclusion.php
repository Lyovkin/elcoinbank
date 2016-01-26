<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $table = 'conclusion';

    protected $fillable =
        [
            'name',
            'email',
            'tel',
            'days',
            'percent',
            'course',
            'wallet1',
            'wallet2',
            'wallet3',
            'amount',
            'total',
            'message',
            'user_id'
        ];
}
