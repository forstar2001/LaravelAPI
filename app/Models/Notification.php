<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table       = 'notifications';
    protected $primaryKey  = 'notification_id';
    protected $fillable    = ['type','description','user_id','read','type','created_at','updated_at'];
    protected $hidden      = [];
    
    //get image full URL
    public function getPostImageAttribute($value)
    {
        return url($value);
    }
    //get image full URL
    public function getPostThumbImageAttribute($value)
    {
        return ($value!='')?url($value):'';
    }
    //get image full URL
    public function getPhotoAttribute($value)
    {
        return ($value!='')?url($value):url('images/profile.jpg');
    }
}
