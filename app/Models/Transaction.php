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
        return $this->belongsTo(InvestmentPlan::class, 'investment_plan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userInvestments()
    {
        return $this->hasOne(UserInvestment::class, 'user_investment_id');
    }

    protected $fillable = [
        'user_id',
        'mode',
        'status',
        'type',
        'amount',
        'investment_plan_id',
        'user_investment_id',
        'description',
        'proof',
    ];
}
