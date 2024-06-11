<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// this will be the route for the storage file local view

Route::get('/file/view/{path}', function ($path) {
    $pathfix = $path;
    if (Storage::disk('local')->exists($pathfix)) {
        return response()->file(storage_path('app/' . $pathfix));
    }

    return response()->json([
        'message' => 'File not found'
    ], 404);
})->where('path', '.*')->name('view.file');