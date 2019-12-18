<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phone';
    protected $primaryKey = 'phone_id';
    public function user()
    {
        return $this->belongsTo('App\Allusers','user_id');
    }
}
