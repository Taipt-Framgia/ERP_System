<?php

namespace App\Services;

use App\Models\FilePermission;
use DB;

class FilePermissionService extends BaseService
{
    public static function create($user, $ancestors)
    {
       DB::beginTransaction();
       try {
            FilePermission::create([
                'user_id' => $user->id,
                'department_id' => $user->department_id,
                'read' => config('file_permission.read.allow'),
                'create' => config('file_permission.create.allow'),
                'delete' => config('file_permission.delete.allow'),
                'upload' => config('file_permission.upload.allow'),
                'download' => config('file_permission.download.allow'),
            ]);

            foreach ($ancestors as $ancestor) {
                FilePermission::create([
                    'user_id' => $user->id,
                    'department_id' => $ancestor,
                    'read' => config('file_permission.read.allow'),
                    'create' => config('file_permission.create.deny'),
                    'delete' => config('file_permission.delete.deny'),
                    'upload' => config('file_permission.upload.deny'),
                    'download' => config('file_permission.download.deny'),
                ]);
            }
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}