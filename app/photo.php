<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    // Eloquent Polymorphic one to many relationship :
    public function imageable()
    {
        return $this->morphTo();
    }
}
