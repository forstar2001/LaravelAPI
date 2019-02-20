<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostList extends Model
{
    protected $table       = 'posts';
    protected $primaryKey  = 'post_id';
    protected $fillable    = ['user_id','template_id','post_name','post_image','post_thumb_image','created_at','updated_at'];
    protected $hidden      = [];
    
    //get image full URL
    public function getPostImageAttribute($value)
    {
        return url($value);
    }
    //get image full URL
    public function getPostThumbImageAttribute($value)
    {
        return url($value);
    }
    //format date to d/m/Y
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
       
    }
}
