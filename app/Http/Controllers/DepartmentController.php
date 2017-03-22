<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $this->viewData['departments'] = DepartmentService::lists();

        return view('department.index', $this->viewData);
    }

    public function create(Request $request)
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = DepartmentService::validate($inputs);

        if ($validator->fails()) {
            return redirect('department/create')->withErrors($validator)->withInput($inputs);
        }

        if (DepartmentService::create($inputs)) {
            return redirect('department')->with(['message' => trans('department.add_successed')]);
        }

        return redirect('department')->with(['error' => trans('department.add_failed')]);
    }

    public function edit(Department $department)
    {
        $this->viewData['department'] = $department;

        return view('department.edit', $this->viewData);
    }

    public function update(Request $request, Department $department)
    {
        $inputs = $request->all();
        $validator = DepartmentService::validate($inputs, $department);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        if (DepartmentService::update($inputs, $department)) {
            return redirect('department')->with(['message' => trans('department.update_successed')]);
        }

        return redirect()->back()->with(['error' => trans('department.update_failed')]);
    }

    public function destroy(Department $department)
    {
        if (DepartmentService::delete($department)) {
            return redirect('department')->with(['message' => trans('department.delete_successed')]);
        }

        return redirect()->back()->with(['error' => trans('department.delete_failed')]);
    }
}
