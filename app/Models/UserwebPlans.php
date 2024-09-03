<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserwebPlans extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="userweb_plans";

    public function users(){
        
        return $this->belongsTo(UsersTables::class,'user_id');
    
    }
}
