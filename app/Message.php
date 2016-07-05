<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messenger';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
