<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function show($filename)
    {
        // Assuming videos are stored in 'storage/app/private/videos/'
        $path = storage_path('app/public/videos/' . $filename);

        if (!file_exists($path)) {
            abort(404); // Return a 404 error if the file doesn't exist
        }

        return response()->file($path);
    }
}
