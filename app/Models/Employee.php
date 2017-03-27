<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'code',
        'first_name',
        'last_name',
        'date_of_birth',
        'address',
        'position',
        'description',
        'phone',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
