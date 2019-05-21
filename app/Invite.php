<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invite';
    //

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
