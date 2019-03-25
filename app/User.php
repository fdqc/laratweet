<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
     * Gets user's comments
     *
     * @return Comment instances collection
     */
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    /**
     * undocumented function summary
     *
     * @return User instances collection
     */
    public function followers()
    {
      return $this->belongsToMany('App\User','followers','user_id','follower_id');
    }

    /**
     * undocumented function summary
     *
     * @return User instances collection
     */
    public function follows()
    {
      return $this->belongsToMany('App\User','followers','follower_id','user_id');
    }
}
