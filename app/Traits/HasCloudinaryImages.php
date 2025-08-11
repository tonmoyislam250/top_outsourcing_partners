<?php

namespace App\Traits;

trait HasCloudinaryImages
{
    /**
     * Get optimized image URL from Cloudinary
     *
     * @param string $publicId
     * @param array $transformations
     * @return string|null
     */
    public function getCloudinaryUrl($publicId, array $transformations = [])
    {
        if (!$publicId) {
            return null;
        }

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

        $cloudName = config('cloudinary.cloud_name');
        return "https://res.cloudinary.com/{$cloudName}/image/upload/{$transformString}/{$publicId}";
    }

    /**
     * Get thumbnail URL
     *
     * @param string $publicId
     * @return string|null
     */
    public function getThumbnailUrl($publicId)
    {
        return $this->getCloudinaryUrl($publicId, [
            'width' => 150,
            'height' => 150,
            'crop' => 'fill',
        ]);
    }

    /**
     * Get medium size URL
     *
     * @param string $publicId
     * @return string|null
     */
    public function getMediumUrl($publicId)
    {
        return $this->getCloudinaryUrl($publicId, [
            'width' => 500,
            'height' => 500,
            'crop' => 'limit',
        ]);
    }

    /**
     * Get large size URL
     *
     * @param string $publicId
     * @return string|null
     */
    public function getLargeUrl($publicId)
    {
        return $this->getCloudinaryUrl($publicId, [
            'width' => 1200,
            'height' => 800,
            'crop' => 'limit',
        ]);
    }
}
