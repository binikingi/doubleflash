<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventServices extends Model
{
    protected $table = 'event_services';

    protected $fillable = ['event_id', 'service_id'];
}
