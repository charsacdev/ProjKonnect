<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="intern_tables";


    #Function for getting the Intern Application
    public function internApplication(){
        
        return $this->hasMany(Intern_Application::class,'internship_id');
    }

    public function internSelected(){
        
        return $this->hasMany(Intern_Application::class,'internship_id');
    }

}
