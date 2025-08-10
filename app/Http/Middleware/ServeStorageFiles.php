<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ServeStorageFiles
{
    /**
     * Handle an incoming request for storage files.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if this is a request for a storage file
        if ($request->is('storage/*')) {
            $path = $request->path();
            
            // Remove 'storage/' prefix to get the actual file path
            $filePath = substr($path, 8); // Remove 'storage/' (8 characters)
            
            // Check if file exists in storage/app/public
            if (Storage::disk('public')->exists($filePath)) {
                $fullPath = Storage::disk('public')->path($filePath);
                $mimeType = Storage::disk('public')->mimeType($filePath);
                
                return response()->file($fullPath, [
                    'Content-Type' => $mimeType,
                    'Cache-Control' => 'public, max-age=31536000', // Cache for 1 year
                ]);
            }
            
            // File not found
            abort(404);
        }

        return $next($request);
    }
}
