<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table       = 'favourites';
    protected $fillable    = ['post_id','user_id','created_at','updated_at'];
    protected $hidden      = [];
    //get image full URL
    public function getPostImageAttribute($value)
    {
        return ($value!='')?url($value):'';
    }
    //get image full URL
    public function getPostThumbImageAttribute($value)
    {
        return ($value!='')?url($value):'';
    }
    //format date to d/m/Y
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
       
    }
    //get thumb image full URL
    public function getImagePngUrlAttribute($value)
    {
        return url($value);
    }
}
