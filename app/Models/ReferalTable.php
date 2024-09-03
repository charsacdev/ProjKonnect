<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="referals";

    public function referee()
    {
        return $this->belongsTo(UsersTables::class,'referal_id');
    }

}
