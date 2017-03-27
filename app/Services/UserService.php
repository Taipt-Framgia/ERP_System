<?php

namespace App\Services;

use Validator;
use App\Models\User;
use DB;

/**
*
*/
class UserService extends BaseService
{
    public static function validate($inputs)
    {
        $validationRules = [
            'email' => 'Required|email|unique:users',
            'password' => 'Required|min:6|confirmed',
            'department_id' => 'Required',
        ];

        return Validator::make($inputs, $validationRules);
    }

    public static function create($inputs)
    {
        $user = User::create([
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
            'department_id' => $inputs['department_id'],
        ]);

        if ($user) {
            return $user;
        }

        return false;
    }

    public static function delete($user)
    {
        return $user->delete();
    }
}