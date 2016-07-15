<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deposit
 * @package App\Models
 * @Bind("deposit")
 */
class Deposit extends Model
{
    protected $table = 'deposits';

    protected $fillable = ['amount', 'total', 'days', 'percent', 'conclusion','status' => 0];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan', 'plan_id');
    }
}
