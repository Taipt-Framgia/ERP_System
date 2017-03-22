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
        Route::get('file', 'FilesController@index');
        Route::post('file/create', 'FilesController@create');
        Route::get('test', 'TestController@index');
        Route::get('department', 'DepartmentController@index');
        Route::get('department/create', 'DepartmentController@create');
        Route::post('department/store', 'DepartmentController@store');
        Route::get('department/edit/{department}', 'DepartmentController@edit');
        Route::post('department/update/{department}', 'DepartmentController@update');
        Route::delete('department/delete/{department}', 'DepartmentController@destroy');

        Route::get('employee', 'EmployeeController@index');
        Route::get('employee/create', 'EmployeeController@create');
        Route::post('employee/store', 'EmployeeController@store');
        Route::get('employee/edit/{employee}', 'EmployeeController@edit');
        Route::post('employee/update/{employee}', 'EmployeeController@update');
        Route::delete('employee/delete/{employee}', 'EmployeeController@destroy');
    });
});
