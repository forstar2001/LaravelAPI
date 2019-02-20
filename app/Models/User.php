<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey   = 'user_id';
    protected $fillable = [
        'username', 'email','profile','password','package_expire_date','is_admin','last_seen'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //get image full URL
    public function getPhotoAttribute($value)
    {
        return ($value!='')?url($value):url('images/profile.jpg');;
    }
    
}
