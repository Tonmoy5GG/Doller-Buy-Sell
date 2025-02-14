<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeConfirm extends Model
{
    protected $table = 'exchange_confirms';

    protected $fillable = ['exchange_id','exchange_price','member_id','transaction_id','image','payment_id','name','email'];

    public function exchange()
    {
        return $this->belongsTo(ExchangeCurrency::class,'exchange_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
