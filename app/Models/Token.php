<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    
    protected $fillable = ['device_id','device_type','device_push_token','user_id','token'];
}
