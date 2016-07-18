<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

    protected $table = 'messenger';

    protected $fillable = ['user_id', 'message', 'createdAt'];

    public $timestamps = false;

    public $dates = ['createdAt'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
