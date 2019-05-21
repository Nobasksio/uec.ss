<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 20/05/2019
 * Time: 14:16
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}