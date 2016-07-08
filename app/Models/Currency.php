<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 * @package App\Models
 * @Bind("currency")
 */
class Currency extends Model
{
    protected $table = 'currency';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function course()
    {
        return $this->hasMany('App\Models\Course');
    }

}
