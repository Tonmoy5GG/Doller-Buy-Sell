<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws';

    protected $fillable = ['member_id','amount','currency_id','details','message'];

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }

}
