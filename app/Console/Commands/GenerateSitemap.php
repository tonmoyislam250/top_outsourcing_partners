<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {--url=https://topoutsourcingpartners.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a static sitemap.xml file with proper URLs for Google indexing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = $this->option('url');
        $blogs = Blog::latest()->get();
        
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . PHP_EOL;
        $sitemap .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . PHP_EOL;
        $sitemap .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . PHP_EOL;
        $sitemap .= '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
        
        // Static pages
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
                rtrim($baseUrl, '/') . $page['url'],
                now()->format('Y-m-d'),
                $page['changefreq'],
                $page['priority']
            );
        }
        
        // Dynamic blog posts with absolute URLs
        foreach ($blogs as $blog) {
            $sitemap .= $this->generateUrlEntry(
                rtrim($baseUrl, '/') . '/blogs/' . $blog->id,
                $blog->updated_at->format('Y-m-d'),
                'weekly',
                '0.7'
            );
        }
        
        $sitemap .= '</urlset>' . PHP_EOL;
        
        // Write to public directory
        $path = public_path('sitemap.xml');
        File::put($path, $sitemap);
        
        $this->info('Sitemap generated successfully at: ' . $path);
        $this->info('Total URLs: ' . (count($allPages) + $blogs->count()));
        
        return 0;
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
