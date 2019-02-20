<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivePosts extends Model
{
    protected $table       = 'active_posts';
    
    //get image full URL
    public function getPostImageAttribute($value)
    {
        return url($value);
    }
    //format date to d/m/Y
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
       
    }
    //get thumb image full URL
    public function getPostThumbImageAttribute($value)
    {
        return url($value);
    }
    //get thumb image full URL
    public function getImagePngUrlAttribute($value)
    {
        return url($value);
    }
    //get thumb image full URL
    public function getThumbImageAttribute($value)
    {
        return ($value!='')?url($value):'';
    }
    
    
}
