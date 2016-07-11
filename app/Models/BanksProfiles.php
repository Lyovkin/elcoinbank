<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BanksProfiles extends Model
{
    protected $table = 'banks_profiles';

    protected $fillable = ['type', 'key'];

    public $timestamps = false;

    public function bank()
    {
        return $this->hasMany('App\Models\Banks');
    }
}
