<?php

namespace App\Services;

use App\Models\Employee;
use Validator;

class EmployeeService extends BaseService
{
    public static function validate($inputs)
    {
        $validationRules = [
            'first_name' => 'required|min:5|max:10',
            'last_name' => 'required|min:5|max:50',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'department_id' => 'required',
        ];

        return Validator::make($inputs, $validationRules);
    }

    public static function create($inputs)
    {
        $employee = Employee::all();
        $code = 'NV' . count($employee);
        $inputs['code'] = $code;
        $employee = Employee::create($inputs);

        if ($employee) {
            return $employee;
        }

        return false;
    }
}