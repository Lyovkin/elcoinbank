<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App
 * @Bind("profile")
 */
class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['phone', 'about'];

    protected $guarded = ['_token'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    /**
     * @return bool
     */
    public function hasWallet()
    {
        return \Auth::user()->profile->wallet === null ? true : false;
    }

    public function profileWithUser()
    {
        return Profile::with('user')->where('user_id', \Auth::user()->id)->first();
    }

    public function wallet()
    {
        return $this->belongsTo('App\Models\Wallet');
    }
}
