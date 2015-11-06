<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = ['title', 'desc', 'pic', 'important'];

    protected $table = 'services';
}
