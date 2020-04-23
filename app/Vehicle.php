<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $connection = 'DB_01';

    public function drivable()
    {
        return $this->morphTo();
    }
}
