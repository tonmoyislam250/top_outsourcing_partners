<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Blog;

class SitemapController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . PHP_EOL;
        $sitemap .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . PHP_EOL;
        $sitemap .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . PHP_EOL;
        $sitemap .= '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
        
        // Static pages with absolute URLs
        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => '/about-us', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/industries', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/solutions', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/team-members', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/team-members/public', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/consult', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/blogs', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => '/manager', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/out', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/privacy-policy', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['url' => '/breach', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['url' => '/retention', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];
        
        // Service detail pages
        $servicePages = [
            ['url' => '/services/finance', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services/ai-integration', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services/corporate-training', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services/third-party', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/services/hr-pay', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];
        
        $allPages = array_merge($staticPages, $servicePages);
        
        foreach ($allPages as $page) {
            $sitemap .= $this->generateUrlEntry(
                url($page['url']),
                now()->format('Y-m-d'),
                $page['changefreq'],
                $page['priority']
            );
        }
        
        // Dynamic blog posts with proper URLs
        foreach ($blogs as $blog) {
            $sitemap .= $this->generateUrlEntry(
                url('/blogs/' . $blog->id),
                $blog->updated_at->format('Y-m-d'),
                'weekly',
                '0.7'
            );
        }
        
        $sitemap .= '</urlset>' . PHP_EOL;
        
        return response($sitemap)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=3600');
    }
    
    /**
     * Validate sitemap XML format
     */
    public function validate()
    {
        $sitemapContent = $this->index()->getContent();
        
        // Check if XML is valid
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        
        libxml_use_internal_errors(true);
        $valid = $dom->loadXML($sitemapContent);
        $errors = libxml_get_errors();
        
        if (!$valid || !empty($errors)) {
            return response()->json([
                'valid' => false,
                'errors' => array_map(function($error) {
                    return $error->message;
                }, $errors)
            ]);
        }
        
        return response()->json([
            'valid' => true,
            'message' => 'Sitemap XML is valid and Google-ready',
            'url_count' => substr_count($sitemapContent, '<url>')
        ]);
    }
    
    private function generateUrlEntry($loc, $lastmod, $changefreq, $priority)
    {
        $entry = '    <url>' . PHP_EOL;
        $entry .= '        <loc>' . htmlspecialchars($loc) . '</loc>' . PHP_EOL;
        $entry .= '        <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
        $entry .= '        <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
        $entry .= '        <priority>' . $priority . '</priority>' . PHP_EOL;
        $entry .= '    </url>' . PHP_EOL;
        
        return $entry;
    }
}
