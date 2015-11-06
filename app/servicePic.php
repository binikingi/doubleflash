<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicePic extends Model
{
    protected $table = 'service_pic';

    protected $fillable = ['service_id', 'pic'];
}
