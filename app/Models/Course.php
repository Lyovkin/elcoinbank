<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * @package App\Models
 * @Bind("course")
 */
class Course extends Model
{
    protected $table = 'course';

    protected $fillable = ['currency_id', 'course_purchase', 'course_sell'];

    public $timestamps = false;

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_id');
    }
}
