<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    public function investmentPlan()
    {
        return $this->belongsTo(InvestmentPlan::class, 'investment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
