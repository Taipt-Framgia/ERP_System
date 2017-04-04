<?php
namespace App\Services\FileServices;

use Validator;

class FileServices
{
    protected $rootPath;

    protected function show()
    {

    }

    protected function createFolder($folderName, $currentPath)
    {

    }

    protected function deleteFolder($path, $type)
    {

    }

    protected function uploadFile($path, $files)
    {

    }

    protected function deleteFile()
    {

    }

    protected function fileValidate($files)
    {
        $extensions = [];
        foreach ($files as $file) {
            $extensions[] = $file ? strtolower($file->getClientOriginalExtension()) : null;
        }

        return Validator::make([
            'file' => $files,
            'extension' => $extensions,
        ], [
            'file.*' => 'file|max:' . 5000,
            'extension.*' => 'in:csv,doc,docx,pdf,xls,xlsx',
        ]);
    }
}