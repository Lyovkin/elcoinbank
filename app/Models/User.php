<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'blocked' => 0, 'balance' => 0,
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'users_roles');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile', 'id', 'user_id');
    }

    /**
     * Find out if user has a specific role
     *
     * $return boolean
     * @param $check
     * @return bool
     */
    public function hasRole($check)
    {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }
}
