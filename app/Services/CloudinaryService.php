<?php

namespace App\Services;

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Illuminate\Http\UploadedFile;

class CloudinaryService
{
    private $uploadApi;

    public function __construct()
    {
        Configuration::instance([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        $this->uploadApi = new UploadApi();
    }

    /**
     * Upload an image to Cloudinary
     *
     * @param UploadedFile $file
     * @param string $folder
     * @param array $options
     * @return array
     */
    public function uploadImage(UploadedFile $file, string $folder = '', array $options = []): array
    {
        $defaultOptions = [
            'folder' => $folder,
            'resource_type' => 'image',
            'quality' => 'auto',
            'fetch_format' => 'auto',
        ];

        $uploadOptions = array_merge($defaultOptions, $options);

        try {
            $result = $this->uploadApi->upload($file->getRealPath(), $uploadOptions);
            
            return [
                'success' => true,
                'url' => $result['secure_url'],
                'public_id' => $result['public_id'],
                'width' => $result['width'],
                'height' => $result['height'],
                'format' => $result['format'],
                'resource_type' => $result['resource_type'],
                'created_at' => $result['created_at'],
                'bytes' => $result['bytes'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Delete an image from Cloudinary
     *
     * @param string $publicId
     * @return array
     */
    public function deleteImage(string $publicId): array
    {
        try {
            $result = $this->uploadApi->destroy($publicId);
            
            return [
                'success' => $result['result'] === 'ok',
                'result' => $result['result'],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Upload team member image
     *
     * @param UploadedFile $file
     * @param string $memberName
     * @param string $type (main|modal)
     * @return array
     */
    public function uploadTeamMemberImage(UploadedFile $file, string $memberName, string $type = 'main'): array
    {
        $folder = 'team_members';
        $publicId = $this->generateTeamMemberPublicId($memberName, $type);
        
        $options = [
            'public_id' => $publicId,
            'overwrite' => true,
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ]
        ];

        return $this->uploadImage($file, $folder, $options);
    }

    /**
     * Upload blog/case study image
     *
     * @param UploadedFile $file
     * @param string $title
     * @param string $type (blog|case_study)
     * @return array
     */
    public function uploadBlogImage(UploadedFile $file, string $title, string $type = 'blog'): array
    {
        $folder = $type === 'case_study' ? 'case_studies' : 'blog_posts';
        $publicId = $this->generateBlogPublicId($title, $type);
        
        $options = [
            'public_id' => $publicId,
            'overwrite' => true,
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ]
        ];

        return $this->uploadImage($file, $folder, $options);
    }

    /**
     * Generate public ID for team member image
     *
     * @param string $memberName
     * @param string $type
     * @return string
     */
    private function generateTeamMemberPublicId(string $memberName, string $type): string
    {
        $cleanName = $this->sanitizeForPublicId($memberName);
        $timestamp = time();
        
        return $type === 'modal' 
            ? "team_member_{$cleanName}_modal_{$timestamp}"
            : "team_member_{$cleanName}_{$timestamp}";
    }

    /**
     * Generate public ID for blog/case study image
     *
     * @param string $title
     * @param string $type
     * @return string
     */
    private function generateBlogPublicId(string $title, string $type): string
    {
        $cleanTitle = $this->sanitizeForPublicId($title);
        $timestamp = time();
        
        return "{$type}_{$cleanTitle}_{$timestamp}";
    }

    /**
     * Sanitize string for use in public ID
     *
     * @param string $string
     * @return string
     */
    private function sanitizeForPublicId(string $string): string
    {
        // Convert to lowercase, replace spaces and special characters with underscores
        $sanitized = strtolower($string);
        $sanitized = preg_replace('/[^a-z0-9_-]/', '_', $sanitized);
        $sanitized = preg_replace('/_+/', '_', $sanitized); // Replace multiple underscores with single
        $sanitized = trim($sanitized, '_'); // Remove leading/trailing underscores
        
        // Limit length to 100 characters (Cloudinary limit is 255)
        return substr($sanitized, 0, 100);
    }

    /**
     * Get optimized image URL with transformations
     *
     * @param string $publicId
     * @param array $transformations
     * @return string
     */
    public function getOptimizedUrl(string $publicId, array $transformations = []): string
    {
        $defaultTransformations = [
            'quality' => 'auto:good',
            'fetch_format' => 'auto',
        ];

        $allTransformations = array_merge($defaultTransformations, $transformations);
        
        // Build transformation string
        $transformString = '';
        foreach ($allTransformations as $key => $value) {
            $transformString .= $key . '_' . $value . ',';
        }
        $transformString = rtrim($transformString, ',');

        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/{$transformString}/{$publicId}";
    }
}
