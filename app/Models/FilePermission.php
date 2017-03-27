<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilePermission extends Model
{
    public $fillable = [
        'user_id',
        'department_id',
        'read',
        'create',
        'delete',
        'upload',
        'download',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
