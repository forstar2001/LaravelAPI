<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table       = 'templates';
    protected $primaryKey  = 'template_id';
    protected $fillable    = ['category_id','user_id','image_url','sub_only','image_png_url'];
    protected $hidden      = ['created_at','updated_at'];
    
    public function getImageUrlAttribute($value)
    {
        return url($value);
    }
    public function getImagePngUrlAttribute($value)
    {
        return url($value);
    }
    public function getThumbImageAttribute($value)
    {
        return ($value!='')?url($value):'';
    }
}
