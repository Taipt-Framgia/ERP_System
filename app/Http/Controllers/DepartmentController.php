<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Models\Department;
use App\Services\FileServices\DropboxFileService;
use DB;

class DepartmentController extends Controller
{
    private $fileService;

    public function __construct(DropboxFileService $dropboxFileService)
    {
        $this->fileService = $dropboxFileService;
    }

    public function index(Request $request, $parent = null)
    {
        $this->viewData['departments'] = DepartmentService::lists($parent);

        return view('department.index', $this->viewData);
    }

    public function create(Request $request)
    {
        $this->viewData['parentLists'] = DepartmentService::getParentList()->prepend(trans('department.no_parent'), '');

        return view('department.create', $this->viewData);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = DepartmentService::validate($inputs);

        if ($validator->fails()) {
            return redirect('department/create')->withErrors($validator)->withInput($inputs);
        }

        $parent = DepartmentService::detail($inputs['parent_id']);
        $parentDiskPath = $parent ? $parent->disk_path : '';

        DB::beginTransaction();
        try {
            $department = DepartmentService::create($inputs);
            if ($department) {
                if ($this->fileService->createFolder($inputs['disk_path'], $parentDiskPath)) {
                    $department->disk_path = $parentDiskPath . '/' . $inputs['disk_path'];
                    $department->save();
                    DB::commit();

                    return redirect('department/show')->with(['message' => trans('department.add_successed')]);
                } else {
                    DepartmentService::delete($department);
                }
            }

            return redirect('department/show')->with(['error' => trans('department.add_failed')]);
        } catch (Exception $e) {
            DB::rollBack();

            return redirect('department/show')->with(['error' => trans('department.add_failed')]);
        }
    }

    public function edit(Department $department)
    {
        $this->viewData['department'] = $department;
        $this->viewData['parentLists'] = DepartmentService::getParentList()->prepend(trans('department.no_parent'), '');

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
            return redirect('department/show')->with(['message' => trans('department.update_successed')]);
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

    public function apiDepartment(Request $request)
    {
        $q = $request->input('q');
        $dataReturn = [];
        $dataReturn['items'] = DepartmentService::apiDepartmentLists($q);

        return $dataReturn;
    }
}
