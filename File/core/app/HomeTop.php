<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeTop extends Model
{
    protected  $table = 'home_tops';

    protected $fillable = ['title','description'];
}
