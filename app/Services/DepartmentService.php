<?php

namespace App\Services;

use App\Models\Department;
use Validator;
use Illuminate\Validation\Rule;

class DepartmentService extends BaseService
{
    public static function lists()
    {
        return Department::paginate(1);
    }

    public static function validate($inputs, $department = null)
    {
        $validateRules = [
            'name' => [
                'required',
            ],
            'address' => 'required',
            'description' => 'required',
        ];
        if ($department) {
            $validateRules['name'][] = Rule::unique('departments')->ignore($department->id);
        } else {
            $validateRules['name'][] = 'unique:departments';
        }
        return Validator::make($inputs, $validateRules);
    }

    public static function create($inputs)
    {
        $department = Department::create($inputs);

        if($department) {
            return $department;
        }

        return false;
    }

    public static function update($inputs, $department)
    {
        if (!$department)
        {
            return false;
        }

        return $department->update([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'description' => $inputs['description'],
        ]);
    }

    public static function delete($department)
    {
        return $department->delete();
    }
}