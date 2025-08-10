<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageController extends Controller
{
    /**
     * Serve files from storage/app/public directory
     */
    public function serve(Request $request, $path)
    {
        // Sanitize the path to prevent directory traversal
        $path = ltrim($path, '/');
        
        // Check if file exists in storage/app/public
        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found');
        }

        // Get the full file path
        $filePath = Storage::disk('public')->path($path);
        
        // Get mime type
        $mimeType = Storage::disk('public')->mimeType($path);
        
        // Set appropriate headers for caching
        $headers = [
            'Content-Type' => $mimeType,
            'Cache-Control' => 'public, max-age=31536000', // Cache for 1 year
            'Expires' => gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000),
        ];

        // Return the file response
        return Response::file($filePath, $headers);
    }

    /**
     * Alternative method using direct file streaming
     */
    public function stream(Request $request, $path)
    {
        $path = ltrim($path, '/');
        
        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found');
        }

        $file = Storage::disk('public')->get($path);
        $mimeType = Storage::disk('public')->mimeType($path);

        return Response::make($file, 200, [
            'Content-Type' => $mimeType,
            'Content-Length' => strlen($file),
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }
}
