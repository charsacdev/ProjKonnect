<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRevenueSettings extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'revenue_sharing'=>'array',
        'point_setting'=>'array',
        'plans_pricing'=>'array'
    ];

    protected $table="admin_revenue_settings";
}
