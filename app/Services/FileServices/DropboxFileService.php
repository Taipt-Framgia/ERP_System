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
        $files = Storage::files($path);
        $folders = Storage::directories($path);
        $allFilesAndFolders['files'] = $files;
        $allFilesAndFolders['folders'] = $folders;

        return $allFilesAndFolders;
    }

    public function create($folderName, $currentPath)
    {
        if (Storage::disk('dropbox')->exists($currentPath . '/' . $folderName)) {
            return false;
        }

        return Storage::makeDirectory($currentPath . '/' . $folderName);
    }
}