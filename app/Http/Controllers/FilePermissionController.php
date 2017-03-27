<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;

class FilePermissionController extends Controller
{
    public function index()
    {
        //$this->viewData['users'] = UserService::lists();

        return view('permission.index');
    }
}
