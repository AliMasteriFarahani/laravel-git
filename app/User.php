<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Eloquent one by one :
    public function post()
    {
        return $this->hasOne('App\Post');
    }

    // Eloquent one to many :

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Eloquent many to many

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Eloquent Polymorphic one to many relationship :
    public function photos()
    {
        return $this->morphMany('App\Photo','imageable');
    }

    public function isAdmin($newRole)
    {
           $user = User::find(5);

            foreach ($user->roles as $role){
                if ($role->name == $newRole){
                    return true;
                }
            }

        return false;

    }
}
