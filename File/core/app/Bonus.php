<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table = 'bonuses';

    protected $fillable = [
        'bonus_type',
        'percentage',
        'member_id',
        'member_reference',
        'under_reference',
        'sell_id',
        'buy_id',
        'exchange_id',
        'amount',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
