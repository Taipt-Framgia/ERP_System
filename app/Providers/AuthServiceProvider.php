<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('file_permission', function ($user, $path, $action) {
            if ($user->isAdmin()) {
                return true;
            }

            if ($path === null || $path === '') {
                if ($action == 'read') {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (strpos('/' . $path, $user->department->disk_path) === false) {
                    $userFilePermissions = $user->filePermissions;
                    foreach ($userFilePermissions as $filePermission) {
                        if ($filePermission->department->disk_path === '/' . $path) {
                            switch ($action) {
                                case 'create':
                                    if ($filePermission->create == config('file_permission.create.allow')) {
                                        return true;
                                    } else {
                                        return false;
                                    }

                                case 'delete':
                                    if ($filePermission->delete == config('file_permission.delete.allow')) {
                                        return true;
                                    } else {
                                        return false;
                                    }

                                case 'upload':
                                    if ($filePermission->upload == config('file_permission.upload.allow')) {
                                        return true;
                                    } else {
                                        return false;
                                    }

                                case 'download':
                                    if ($filePermission->download == config('file_permission.donwload.allow')) {
                                        return true;
                                    } else {
                                        return false;
                                    }

                                default:
                                    return true;
                            }
                        }
                    }

                    return false;
                } else {
                    return true;
                }
            }
        });

    }
}
