<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Truck extends Model
{
    protected $connection = 'DB_02';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($resource) {
            if (!$resource->getKey()) {
                $resource->{$resource->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
