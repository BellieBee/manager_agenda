<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'maps';

    protected $fillable = [
    	'map',
    	'employee_id'
    ];

    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }
}
