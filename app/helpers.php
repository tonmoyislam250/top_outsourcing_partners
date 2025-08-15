<?php

if (!function_exists('storage_asset')) {
    /**
     * Generate a storage asset URL that works in both local and production environments
     *
     * @param string $path
     * @return string
     */
    function storage_asset($path)
    {
        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // In production, always use the route-based storage serving
        if (app()->environment('production')) {
            return url('storage/' . $path);
        }
        
        // In local development, try standard asset first, fallback to route
        $standardUrl = asset('storage/' . $path);
        
        // Check if the symlink exists locally
        if (file_exists(public_path('storage'))) {
            return $standardUrl;
        }
        
        // Fallback to route-based serving
        return url('storage/' . $path);
    }
}

if (!function_exists('blog_image_url')) {
    /**
     * Generate a blog image URL
     *
     * @param string|null $imagePath
     * @return string|null
     */
    function blog_image_url($imagePath)
    {
        if (!$imagePath) {
            return null;
        }
        
        return storage_asset($imagePath);
    }
}
