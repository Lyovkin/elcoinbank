<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestMoney extends Model
{
    protected $table = 'request_money';

    protected $fillable = [
        'name',
        'email',
        'tel',
        'days',
        'percent',
        'course',
        'wallet',
        'amount',
        'message',
        'approve' => 0,
        'user_id',
        'conclusion'
    ];
}
