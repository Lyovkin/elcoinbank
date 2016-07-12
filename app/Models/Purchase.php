<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 * @package App\Models
 * @Bind("purchase")
 */
class Purchase extends Model
{
    protected $table = 'request_purchase';

    protected $fillable = ['payment', 'course', 'amount', 'total', 'message', 'status_trust',
        'status_moderation' => 0, 'status_admin' => 0];

    protected $guarded = ['_token'];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'currency_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
