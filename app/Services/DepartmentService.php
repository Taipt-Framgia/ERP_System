<?php

namespace App\Services;

use App\Models\Department;
use Validator;
use Illuminate\Validation\Rule;

class DepartmentService extends BaseService
{
    public static function lists($parent = null)
    {
        return Department::where('parent_id', $parent)->paginate(10);
    }

    public static function getParentList()
    {
        return Department::pluck('name', 'id');
    }

    public static function detail($id)
    {
        if ($id === '') {
            return false;
        }

        return Department::find($id);
    }

    public static function validate($inputs, $department = null)
    {
        $validateRules = [
            'name' => [
                'required',
            ],
            'address' => 'required',
            'description' => 'required',
            'disk_path' => 'required',
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
        $department = Department::create([
            'name' => $inputs['name'],
            'address' => $inputs['address'],
            'description' => $inputs['description'],
            'parent_id' => $inputs['parent_id'] ? $inputs['parent_id'] : null,
        ]);

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

    public static function apiDepartmentLists($q)
    {
        $department = Department::select('id', 'name')->where('name', 'like', "%$q%")->get();

        return $department;
    }

    public static function getAncestor($id)
    {
        $ancestors = [];
        $department = Department::find($id);
        while ($department->parent_id != null) {
            $ancestors[] = Department::find($department->parent_id)->id;
            $department = Department::find($department->parent_id);
        }

        return $ancestors;
    }
}