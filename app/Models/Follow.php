<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table       = 'follow';
    protected $fillable    = ['user_id','follower_id'];
    protected $hidden      = ['created_at','updated_at'];
    
    
    //get image full URL
    public function getPhotoAttribute($value)
    {
        return ($value!='')?url($value):url('images/profile.jpg');
    }
}
