<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = '__pk';
    public $timestamps = false;
    protected $table = 'properties';

    public function location()
    {
        return $this->belongsTo('App\Location', '_fk_location', '__pk');
    }
}
