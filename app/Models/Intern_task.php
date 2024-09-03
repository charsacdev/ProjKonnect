<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intern_task extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="intern_tasks";
}
