<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class help extends Model
{
    protected $table = 'helps';

    protected $fillable = ['img', 'content', 'link'];
}
