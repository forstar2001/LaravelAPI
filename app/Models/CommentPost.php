<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $table       = 'comments';
    protected $primaryKey  = 'comment_id';
    protected $fillable    = ['post_id','user_id','comment','created_at'];
    protected $hidden      = ['updated_at'];
    
    //format date to d/m/Y
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
    }
    
     //format date to d/m/Y
    public function getPhotoAttribute($value)
    {
        return ($value!='')?url($value):url('images/profile.jpg');
    }
    
}
