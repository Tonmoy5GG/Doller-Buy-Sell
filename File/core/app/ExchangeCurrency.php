<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeCurrency extends Model
{
    protected $table = 'exchange_currencies';

    protected $fillable = ['currency_id','quantity','exchange_currency_id','exchange_quantity'];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
    public function exchangeCurrency()
    {
        return $this->belongsTo(Currency::class, 'exchange_currency_id');
    }
}
