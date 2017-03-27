<?php
namespace App\Services\FileServices;

use Illuminate\Support\Facades\Storage;

class LocalFileServices extends FileServices
{

    function __construct()
    {
        $this->rootPath = '/';
    }

    public function show($path = null)
    {
        $allFilesAndFolders = [];
        $path = $path ?? $this->rootPath;
        if ($path != '' && $path != $this->rootPath) {
            if (!Storage::disk('custom')->exists($path)) {
                throw new Exception('path not found', 404);
            }
        }
        $files = Storage::disk('custom')->files($path);
        $folders = Storage::disk('custom')->directories($path);
        $allFilesAndFolders['files'] = $files;
        $allFilesAndFolders['folders'] = $folders;

        return $allFilesAndFolders;
    }

    public function createFolder($folderName, $currentPath)
    {
        if (Storage::disk('custom')->exists($currentPath . '/' . $folderName)) {
            return false;
        }

        return Storage::disk('custom')->makeDirectory($currentPath . '/' . $folderName);
    }

    public function deleteFolder($path, $type)
    {
        $result;
        switch ($type) {
            case 'folder':
                $result = Storage::disk('custom')->deleteDirectory($path);
                break;

            default:
                $result = Storage::disk('custom')->delete($path);
                break;
        }

        return $result;
    }

    public function fileValidate($input)
    {
        return parent::fileValidate($input);
    }

    public function uploadFile($path, $file)
    {
        $path =  $path ? $path : $this->rootPath;

        return Storage::disk('custom')->putFileAs($path, $file, $file->getClientOriginalName());
    }

    public function getFile($path)
    {
        return Storage::disk('custom')->get($path);
    }
}