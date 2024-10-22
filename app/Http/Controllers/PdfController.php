<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function show($filename)
    {
        // Assuming PDFs are stored in 'storage/app/private/pdfs/'
        $path = storage_path('app/public/pdfs/' . $filename);

        if (!file_exists($path)) {
            abort(404); // Return a 404 error if the file doesn't exist
        }

        return response()->file($path);
    }
}
