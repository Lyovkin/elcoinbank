<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banks
 * @package App\Models
 * @Bind("bank")
 */
class Banks extends Model
{
    protected $table = 'banks';

    protected $fillable = ['amount'];

    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo('App\Models\BanksProfiles', 'banks_profiles_id');
    }
}
