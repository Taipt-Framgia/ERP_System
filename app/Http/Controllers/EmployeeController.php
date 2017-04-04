<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function index()
    {

    }

    public function create(Request $request)
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = EmployeeService::validate($inputs);

        if ($validator->fails()) {
            return redirect('employee/create')->withErrors($validator)->withInput($inputs);
        }

        if (EmployeeService::create($inputs)) {
            return redirect('employee')->with(['message' => trans('employee.add_successed')]);
        }

        return redirect('employee')->with(['error' => trans('employee.add_failed')]);
    }
}
