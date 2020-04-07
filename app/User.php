<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','role_id','is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
        return $this->belongsTo('App\Role');
    }
   public function photo(){
        return $this->belongsTo('App\Photo');
   }
    public function isAdmin() {
        if ($this->role->name == 'Administrator'){
            return true;
        }
        return false;
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
    public function category(){
        return $this->belongsTo('App\Post');
    }
}
