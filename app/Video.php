<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    // polymorphic many to many relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

}
