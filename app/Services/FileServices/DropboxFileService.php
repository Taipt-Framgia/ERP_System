<?php
namespace App\Services\FileServices;

use Illuminate\Support\Facades\Storage;
use Exception;

class DropboxFileService extends FileServices
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
            if (!Storage::disk('dropbox')->exists($path)) {
                throw new Exception('path not found', 404);
            }
        }
        $files = Storage::disk('dropbox')->files($path);
        $folders = Storage::disk('dropbox')->directories($path);
        $allFilesAndFolders['files'] = $files;
        $allFilesAndFolders['folders'] = $folders;

        return $allFilesAndFolders;
    }

    public function createFolder($folderName, $currentPath)
    {
        if (Storage::disk('dropbox')->exists($currentPath . '/' . $folderName)) {
            return false;
        }

        return Storage::disk('dropbox')->makeDirectory($currentPath . '/' . $folderName);
    }

    public function deleteFolder($path, $type)
    {
        $result;
        switch ($type) {
            case 'folder':
                $result = Storage::disk('dropbox')->deleteDirectory($path);
                break;

            default:
                $result = Storage::disk('dropbox')->delete($path);
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

        return Storage::disk('dropbox')->putFileAs($path, $file, $file->getClientOriginalName());
    }

    public function getFile($path)
    {
        if (Storage::disk('dropbox')->exists($path))
        {
            return Storage::disk('dropbox')->get($path);
        }

        return false;
    }
}