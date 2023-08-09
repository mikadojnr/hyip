<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{

    use HasFactory;

    protected $table = 'investment_plans';

    public function investment()
    {
        return $this->hasMany(UserInvestment::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }



}
