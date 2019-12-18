<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allusers extends Model
{
    // get all users in this model
    protected $table ='allusers';
    protected $primaryKey = 'user_id';

    public function phone()
    {
        return $this->hasOne('App\Phone','user_id');
    }
}
