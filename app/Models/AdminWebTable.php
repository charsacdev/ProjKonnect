<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminWebTable extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $table="admin_web_tables";

    public function blogers()
    {
        return $this->hasMany(Blog::class,'author_id');
    
    }
}
