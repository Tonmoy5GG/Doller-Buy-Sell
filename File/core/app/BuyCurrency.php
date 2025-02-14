<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyCurrency extends Model
{
    protected $table = 'buy_currencies';

    protected $fillable = ['currency_id','quantity','status'];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
