<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class UsersTables extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];

    protected $table="users";

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'country_id' => 'integer',
        'university_id' => 'integer',
        'bad_word_count' => 'integer',
    ];

    public function plans(){
        
        return $this->hasOne(UserwebPlans::class,'user_id');
    }

    public function interests(){

        return $this->belongsToMany(Interest::class, 'user_interests','user_id', 'interest_id');
    }
}
