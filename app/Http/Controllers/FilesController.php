<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileServices\LocalFileServices;
use App\Services\FileServices\DropboxFileService;

class FilesController extends Controller
{
    public function index()
    {
        return view('file.index', ['locale' => 'vi']);
    }
}
