<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="terms_tables";
}
