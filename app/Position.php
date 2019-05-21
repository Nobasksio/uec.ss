<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function invite()
    {
        return $this->hasOne('App\Invite');
    }
}
