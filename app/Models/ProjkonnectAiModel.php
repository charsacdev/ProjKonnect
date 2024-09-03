<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjkonnectAiModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="projkonnect_ai_models";
}
