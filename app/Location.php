<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = '__pk';
    public $timestamps = false;

    public function properties()
    {
        return $this->hasMany('App\Property', '_fk_location');
    }
}
