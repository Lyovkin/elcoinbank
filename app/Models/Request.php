<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';

    protected $fillable = ['name', 'email', 'tel', 'wallet', 'message', 'amount'];
}
