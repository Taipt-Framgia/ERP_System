<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('vendor.elfinder.elfinder', ['dir' => 'packages/barryvdh/elfinder', 'locale' => 'vi']);
    }
}
