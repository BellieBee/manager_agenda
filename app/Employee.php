<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
    	'employee',
    	'code',
    	'location',
    	'user_id',
    	'address',
    	'department_id',
    	'phone_1',
    	'phone_2',
    	'email',
    	'date'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function map()
    {
        return $this->hasOne('App\Map');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
