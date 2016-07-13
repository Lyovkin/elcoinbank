<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plan
 * @package App\Models
 * @Bind("plan")
 */
class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = ['days', 'percent'];

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo('App\Models\PlansType', 'type_id');
    }
}
