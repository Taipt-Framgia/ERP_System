<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'logs'], function(){
    Route::auth();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'AdminController@index');
        Route::get('file/show/{path?}', 'FilesController@index')->where('path', '(.*)');
        Route::post('file/create', 'FilesController@create');
        Route::post('file/delete', 'FilesController@delete');
        Route::post('file/upload', 'FilesController@uploadFile');
        Route::post('file/download', 'FilesController@downloadFile');

        Route::get('department/show/{parent?}', 'DepartmentController@index');
        Route::get('department/create', 'DepartmentController@create');
        Route::post('department/store', 'DepartmentController@store');
        Route::get('department/edit/{department}', 'DepartmentController@edit');
        Route::post('department/update/{department}', 'DepartmentController@update');
        Route::delete('department/delete/{department}', 'DepartmentController@destroy');
        Route::get('department/api/list', 'DepartmentController@apiDepartment');

        Route::get('employee', 'EmployeeController@index');
        Route::get('employee/create', 'EmployeeController@create');
        Route::post('employee/store', 'EmployeeController@store');
        Route::get('employee/edit/{employee}', 'EmployeeController@edit');
        Route::post('employee/update/{employee}', 'EmployeeController@update');
        Route::delete('employee/delete/{employee}', 'EmployeeController@destroy');

        Route::get('permission', 'FilePermissionController@index');

        Route::get('user', 'UserController@index');
        Route::get('user/create', 'UserController@create');
        Route::post('user/store', 'UserController@store');
    });
});
