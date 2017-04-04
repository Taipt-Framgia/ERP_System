<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\DepartmentService;
use App\Services\FilePermissionService;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator =  UserService::validate($inputs);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        $ancestors = DepartmentService::getAncestor($inputs['department_id']);

        $user = UserService::create($inputs);
        if ($user) {
            if (FilePermissionService::create($user, $ancestors)) {
                return redirect()->back()->with(['message' => trans('language.success')]);
            } else {
                UserService::delete($user);
            }
        }

        return redirect()->back()->with(['error' => trans('language.error')]);
    }
}
