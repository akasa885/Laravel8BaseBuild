<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    public function uploadFile(
        $file,  
        $pathFolder = 'image', // path after (public/) ex: image, document, image/media, etc
        $identifierFolder = null, // of the identifier
        $identifierSubFolder = null, // of the identifier sub folder
        $returnIdentifierWithFile = false, // return identifier with file name
        $saveToStorage = false, // save to storage
        $encryptFileName = true // encrypt file name
    ){
        try {
            if ($file != null) {
                $fileNameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();

                if ($encryptFileName) $filename = $this->encryptFileName($filename);
                else $filename = $filename . '-' . time();
                $filenameSimpan = $filename . '.' . $extension;

                if ($saveToStorage) {
                    $path = $this->storeToStorage($filenameSimpan, $pathFolder, $file);
                    return $path;
                }

                $build_path = $this->buildPath($pathFolder, $identifierFolder, $identifierSubFolder);
                $path = $file->move($build_path, $filenameSimpan);
                $path = url($path);

                if ($returnIdentifierWithFile) {
                    $fileDetail = [
                        'filename' => $filenameSimpan,
                        'path' => $this->buildIdentifierFolder($pathFolder, $identifierFolder, $identifierSubFolder) . $filenameSimpan,
                    ];
                    
                    return $fileDetail;
                } else {
                    return $filenameSimpan;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // return false;
        }
    }

    private function storeToStorage(string $fileName, string $path, $file): string
    {
        $filepath = Storage::disk('public')->putFileAs($path, $file, $fileName);

        return $filepath;
    }

    private function cleanPath($path)
    {
        // Check if the path has a slash at the start
        if(substr($path, 0, 1) == '/') {
            // Remove the slash
            $path = substr($path, 1);
        }

        // Check if the path has a slash at the end
        if(substr($path, -1) == '/') {
            // Remove the slash
            $path = substr($path, 0, -1);
        }

        // Return the cleaned path
        return $path;
    }

    private function buildPath(...$args)
    {
        $path = '';
        foreach ($args as $arg) {
            if ($arg != null) {
                $arg = $this->cleanPath($arg);
                $path .= strtolower($arg) . '/';
            }
        }

        return $path;
    }

    private function buildIdentifierFolder(...$args)
    {
        $path = '';
        foreach ($args as $arg) {
            if ($arg != null) {
                $arg = $this->cleanPath($arg);
                $path .= strtolower($arg) . '/';
            }
        }

        return $path;
    }

    public function changePathWithoutUrl($path)
    {
        $path = str_replace(url('/'), '', $path);
        
        return $path;
    }

    private function encryptFileName($filename)
    {
        $filename = md5($filename.'-'.time());

        return $filename;
    }
}