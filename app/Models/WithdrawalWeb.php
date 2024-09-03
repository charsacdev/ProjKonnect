<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalWeb extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="withdrawal_webs";

    public function bankdetails()
    {
        return $this->belongsTo(BankDetailsWeb::class, 'bank_id');
    }

    public function proguidedetails()
    {
        return $this->belongsTo(UsersTables::class, 'proguide_id');
    
    }
}
