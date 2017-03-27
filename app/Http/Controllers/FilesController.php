<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileServices\LocalFileServices;
use App\Services\FileServices\DropboxFileService;

class FilesController extends Controller
{
    public function index(Request $request, DropboxFileService $fileService)
    {
        $path = $request->input('path');
        $allFoldersAndFiles = $fileService->show($path);
        $allFoldersAndFiles['current_path'] = $path;
        $allFoldersAndFiles['parent_path'] = substr($path, 0, strrpos( $path, '/'));

        return view('file.index', $allFoldersAndFiles);
    }

    public function create(Request $request, DropboxFileService $fileService)
    {
    	$folderName = $request->input('folderName');
    	$currentPath = $request->input('currentPath');

    	if ($fileService->create($folderName, $currentPath)) {
    		return response()->json(['status' => 1, 'message' => trans('language.success')]);
    	}

    	return response()->json(['status' => 0, 'message' => trans('language.error')]);
    }
}
