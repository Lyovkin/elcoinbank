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

    protected $fillable = ['phone', 'wallet', 'about'];

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


    public function profileWithUser()
    {
        return Profile::with('user')->where('user_id', \Auth::user()->id)->first();
    }

}
