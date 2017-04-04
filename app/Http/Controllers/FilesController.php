<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\FileServices\LocalFileServices;
use App\Services\FileServices\DropboxFileService;
use Illuminate\Support\Facades\Gate;

class FilesController extends Controller
{
    private $fileService;

    public function __construct(DropboxFileService $dropboxFileService)
    {
        $this->fileService = $dropboxFileService;
    }
    public function index(Request $request, $path = null)
    {
        abort_if(Gate::denies('file_permission', [$path, 'read']), 403, 'Unauthorized action.');
        $allFoldersAndFiles = $this->fileService->show($path);
        $allFoldersAndFiles['current_path'] = $path;
        $allFoldersAndFiles['parent_path'] = substr($path, 0, strrpos( $path, '/'));

        return view('file.index', $allFoldersAndFiles);
    }

    public function create(Request $request)
    {
        $folderName = $request->input('folderName');
        $currentPath = $request->input('currentPath');
        abort_if(Gate::denies('file_permission', [$currentPath, 'create']), 403, 'Unauthorized action.');
        if ($this->fileService->createFolder($folderName, $currentPath)) {
            return response()->json(['status' => 1, 'message' => trans('file.create_success')]);
        }

        return response()->json(['status' => 0, 'message' => trans('file.create_error')]);
    }

    public function delete(Request $request)
    {
        $folderName = $request->input('path');
        $parentPath = substr($folderName, 0, strrpos( $folderName, '/'));
    	$type = $request->input('type');
        abort_if(Gate::denies('file_permission', [$parentPath, 'delete']), 403, 'Unauthorized action.');

        if ($this->fileService->deleteFolder($folderName, $type)) {
            return response()->json(['status' => 1, 'message' => trans('file.delete_success')]);
        }

        return response()->json(['status' => 0, 'message' => trans('file.delete_error')]);
    }

    public function uploadFile(Request $request)
    {
        $inputs = $request->all();
        abort_if(Gate::denies('file_permission', [$inputs['path'], 'upload']), 403, 'Unauthorized action.');
        $fileInputs = is_array($inputs['file']) ? $inputs['file'] : [$inputs['file']];
        $validator = $this->fileService->fileValidate($fileInputs);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (count($fileInputs) == 1) {
            if (!$this->fileService->uploadFile($inputs['path'], $fileInputs[0])) {
                return response()->json(['errors' => trans('file.upload_error')], 422);
            }
        }

        return response()->json(['message' => trans('file.upload_success')]);
    }

    public function downloadFile(Request $request)
    {
        $path = $request['path'];
        $parentPath = substr($path, 0, strrpos( $path, '/'));
        $fileName = str_replace($parentPath . '/', '', $path);
        abort_if(Gate::denies('file_permission', [$parentPath, 'download']), 403, 'Unauthorized action.');
        $file = $this->fileService->getFile($path);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        return $file;
    }
}
