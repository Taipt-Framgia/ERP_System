<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    public function employees()
    {
        return $this->hasMany('App\Models\Employees');
    }
}
