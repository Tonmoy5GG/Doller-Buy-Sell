<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyConfirm extends Model
{
    protected $table = 'buy_confirms';

    protected $fillable = ['buy_id','transaction_details','member_id','image','name','email'];

    public function buy()
    {
        return $this->belongsTo(BuyCurrency::class,'buy_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
