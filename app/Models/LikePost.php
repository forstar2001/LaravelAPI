<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $table       = 'likes';
    protected $fillable    = ['post_id','user_id','created_at','updated_at'];
    protected $hidden      = [];
    
}
