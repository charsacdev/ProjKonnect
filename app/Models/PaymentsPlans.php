<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsPlans extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="userweb_plans";
}
