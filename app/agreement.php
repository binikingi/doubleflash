<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agreement extends Model
{
    protected $table = 'agreements';

    protected $fillable = ['line'];
}
