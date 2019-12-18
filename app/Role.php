<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Eloquent many to many relationship :
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('created_at');
    }
}
