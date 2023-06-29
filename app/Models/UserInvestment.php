<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'investment_plan_id',
        'duration',
        'amount',
        'is_active',
        'is_completed',
        'transaction_id',
    ];

    protected $table = 'user_investments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function investmentPlan()
    {
        return $this->belongsTo(InvestmentPlan::class);
    }

    public function transaction()
{
    return $this->belongsTo(Transaction::class);
}
}
