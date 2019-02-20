<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestTemplate extends Model
{
    protected $table       = 'test_templates';
    protected $primaryKey  = 'temp_id';
    protected $fillable    = ['temp_name','image_url','image_png_url'];
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
