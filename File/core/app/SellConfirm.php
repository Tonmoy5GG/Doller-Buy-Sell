<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellConfirm extends Model
{
    protected $table = 'sell_confirms';

    protected $fillable = ['sell_id','transaction_id','image','member_id','name','email','status','payment_method'];

    public function sell()
    {
        return $this->belongsTo(SellCurrency::class,'sell_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
