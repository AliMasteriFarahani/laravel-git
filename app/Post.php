<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Post extends Model
{

    use softDeletes;
    public $directory = '/images/';
    protected $dates = ['deleted_at'];

    protected $table = 'posts';  // class name + s = table name as default
    protected $primaryKey = 'id';  // as default
    protected $fillable = ['title', 'body'];

    // Eloquent one by one reverse :
    // Eloquent one to many :
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Eloquent Polymorphic one to many relationship :
    public function photos()
    {
        return $this->morphMany('App\Photo','imageable');
    }

    // polymorphic many to many relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }
}
