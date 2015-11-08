<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $table = 'info';
    protected $fillable = ['name', 'title', 'description'];
}
