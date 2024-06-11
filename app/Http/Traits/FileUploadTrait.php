<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Throwable;

trait FileUploadTrait
{
    /**
     * 
     * @param mixed $file 
     * @param string $pathFolder 
     * @param string|null $identifierFolder 
     * @param string|null $identifierSubFolder 
     * @param bool $returnIdentifierWithFile 
     * @param bool $saveToStorage 
     * @param bool $storagePublic
     * @param bool $encryptFileName 
     * @return string|string[]|void 
     * @throws Throwable 
     */
    public function uploadFile(
        $file,  
        $pathFolder = 'image', // path after (public/) ex: image, document, image/media, etc
        string $identifierFolder = null, // of the identifier
        string $identifierSubFolder = null, // of the identifier sub folder
        $returnIdentifierWithFile = false, // return identifier with file name
        $saveToStorage = false, // save to storage
        $storagePublic = true, // save to storage public
        $encryptFileName = true // encrypt file name
    ){
        try {
            if ($file != null) {
                $fileNameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $originalFilename = $filename;
                $extension = $file->getClientOriginalExtension();

                if ($encryptFileName) $filename = $this->encryptFileName($filename);
                else $filename = $filename . '-' . time();
                $filenameSimpan = $filename . '.' . $extension;

                if ($saveToStorage) {
                    if ($storagePublic) $path = $this->storeToStoragePublic($filenameSimpan, $pathFolder, $file, true);
                    else $path = $this->storeToStorage($filenameSimpan, $pathFolder, $file, false);
                    
                    if ($returnIdentifierWithFile) {
                        if ($storagePublic) {
                            $fileDetail = [
                                'original_filename' => $originalFilename,
                                'filename' => $filenameSimpan,
                                'path' => $path,
                                'url' => Storage::disk('public')->url($path),
                            ];
                        } else {
                            $fileDetail = [
                                'original_filename' => $originalFilename,
                                'filename' => $filenameSimpan,
                                'path' => $path,
                                'url' => route('storage.view.file', $path),
                            ];
                        }
                        
                        return $fileDetail;
                    }

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

    /**
     * 
     * @param string $fileName 
     * @param string $path 
     * @param mixed $file 
     * @param bool $url
     * @return string 
     */
    private function storeToStorage(string $fileName, string $path, $file, $url = false): string
    {
        $filepath = Storage::disk('local')->putFileAs($path, $file, $fileName);

        if ($url) {
            $filepath = Storage::disk('local')->url($filepath);
        }

        return $filepath;
    }

    /**
     * 
     * @param string $fileName 
     * @param string $path 
     * @param mixed $file 
     * @param bool $url 
     * @return string 
     */
    private function storeToStoragePublic(string $fileName, string $path, $file, $url = false): string
    {
        $filepath = Storage::disk('public')->putFileAs($path, $file, $fileName);

        if ($url) {
            $filepath = Storage::disk('public')->url($filepath);
        }

        return $filepath;
    }

    /**
     * 
     * @param string $path 
     * @return string 
     */
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

    /**
     * 
     * @param mixed $args 
     * @return string 
     */
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

    /**
     * 
     * @param mixed $args 
     * @return string 
     */
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

    /**
     * 
     * @param string $filename 
     * @return string 
     */
    private function encryptFileName(string $filename)
    {
        $filename = md5($filename.'-'.time());

        return $filename;
    }
}