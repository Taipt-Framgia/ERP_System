<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'address',
        'description',
    ];

    public function employees()
    {
        return $this->hasMany('App\Models\Employees');
    }

    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }

    public function filePermissions()
    {
        return $this->hasMany('App\Models\FilePermission');
    }
}
