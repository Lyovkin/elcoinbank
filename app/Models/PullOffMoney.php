<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PullOffMoney
 * @package App\Models
 * @Bind("pulloffmoney")
 */
class PullOffMoney extends Model
{
    use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

    protected $table = 'pull_off_moneys';

    protected $fillable = ['amount', 'status' => 0];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
