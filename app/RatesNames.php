<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatesNames extends Model
{
    protected $fillable = ['name', 'short_name', 'img'];
}
