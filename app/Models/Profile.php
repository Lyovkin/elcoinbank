<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App
 */
class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['name', 'last_name', 'phone', 'about', 'wallet', 'user_id'];

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

    public function hasWallet()
    {
        return \Auth::user()->profile->wallet === null ? true : false;
    }

    public static function userProfile()
    {
        return Profile::with('user')->where('user_id', \Auth::user()->id)->first();
    }
}
