<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table       = 'subscribers';
    protected $primaryKey  = 'id';
    protected $fillable    = ['type','user_id','start_date','end_date','created_at','updated_at'];
    protected $hidden      = [];
    
}
