<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Eloquent has many through relationship :

    public function posts()
    {
        return $this->hasManyThrough(Post::class,User::class);
    }

}
