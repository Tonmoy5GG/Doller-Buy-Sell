<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['name','sell_rate','buy_rate','image','payment_id'];



}
