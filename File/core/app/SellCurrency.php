<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellCurrency extends Model
{
    protected $table = 'sell_currencies';

    protected $fillable = ['currency_id','quantity','status','receive'];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
