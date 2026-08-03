<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ScrapeArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes all news articles from SMAN 1 Tanjungpinang website (category: berita-utama) and imports them with images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Starting scraper to migrate articles from SMAN 1 Tanjungpinang official website...");

        $categoryId = 4; // berita-utama
        $page = 1;
        $perPage = 10; // Process in batches of 10 for safety
        $importedCount = 0;
        $updatedCount = 0;

        // Ensure directories exist
        $dir = storage_path('app/public/images/articles');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
            $this->info("Created directory: {$dir}");
        }

        while (true) {
            $this->info("Fetching page {$page} of articles...");
            
            try {
                $response = Http::timeout(60)->get("https://www.sman1-tpi.sch.id/wp-json/wp/v2/posts", [
                    'categories' => $categoryId,
                    '_embed' => 1,
                    'per_page' => $perPage,
                    'page' => $page,
                ]);

                if ($response->status() === 400) {
                    $this->info("Reached the end of articles pages.");
                    break;
                }

                if (!$response->successful()) {
                    $this->error("HTTP request failed with status: " . $response->status());
                    break;
                }

                $posts = $response->json();
                if (empty($posts)) {
                    $this->info("No more posts found.");
                    break;
                }

                $this->info("Found " . count($posts) . " posts on page {$page}. Processing...");

                foreach ($posts as $post) {
                    $title = html_entity_decode($post['title']['rendered'] ?? '', ENT_QUOTES, 'UTF-8');
                    $slug = $post['slug'] ?? Str::slug($title);
                    
                    if (empty($title)) {
                        $this->warn("Skipping post with empty title.");
                        continue;
                    }

                    $this->line("Processing article: <info>{$title}</info> (slug: {$slug})");

                    // 1. Author
                    $author = 'Admin Humas';
                    if (isset($post['_embedded']['author'][0]['name'])) {
                        $author = $post['_embedded']['author'][0]['name'];
                    }

                    // 2. Published date
                    $publishedAt = isset($post['date']) ? Carbon::parse($post['date']) : Carbon::now();

                    // 3. Featured Image
                    $featuredImageUrl = null;
                    if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
                        $featuredImageUrl = $post['_embedded']['wp:featuredmedia'][0]['source_url'];
                    } elseif (!empty($post['jetpack_featured_media_url'])) {
                        $featuredImageUrl = $post['jetpack_featured_media_url'];
                    }

                    $localFeaturedImage = null;
                    if ($featuredImageUrl) {
                        $this->line(" - Downloading featured image: {$featuredImageUrl}");
                        $localFeaturedImage = $this->downloadImage($featuredImageUrl, $slug);
                    }

                    // 4. Content and Inline Images
                    $content = $post['content']['rendered'] ?? '';
                    if (!empty($content)) {
                        $this->line(" - Scanning and downloading inline images...");
                        $content = $this->processContentImages($content, $slug);
                    }

                    // 5. Update or Create Article
                    $existing = Article::where('slug', $slug)->first();
                    
                    $articleData = [
                        'title' => $title,
                        'category' => 'utama', // per option B mapping
                        'author' => $author,
                        'content' => $content,
                        'image' => $localFeaturedImage,
                        'is_featured' => false, // per option B setting
                        'published_at' => $publishedAt,
                    ];

                    Article::updateOrCreate(
                        ['slug' => $slug],
                        $articleData
                    );

                    if ($existing) {
                        $updatedCount++;
                        $this->info(" - Article updated successfully.");
                    } else {
                        $importedCount++;
                        $this->info(" - Article imported successfully.");
                    }
                }

                $page++;
            } catch (\Exception $e) {
                $this->error("Error occurred while fetching or processing posts: " . $e->getMessage());
                break;
            }
        }

        $this->info("Scraping completed!");
        $this->info("Summary: {$importedCount} articles imported, {$updatedCount} articles updated.");
        return Command::SUCCESS;
    }

    /**
     * Download image from URL and save it to public/images/articles
     */
    private function downloadImage($url, $slug)
    {
        if (empty($url)) {
            return null;
        }

        try {
            $dir = storage_path('app/public/images/articles');

            // Parse URL path to get extension
            $path = parse_url($url, PHP_URL_PATH);
            $pathInfo = pathinfo($path);
            $extension = $pathInfo['extension'] ?? 'jpg';
            
            // Strip any query parameters from extension
            $extension = explode('?', $extension)[0];
            if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
                $extension = 'jpg';
            }

            // Create a unique filename
            $filename = $slug . '-' . substr(md5($url), 0, 6) . '.' . $extension;
            $localPath = $dir . DIRECTORY_SEPARATOR . $filename;
            $dbPath = '/storage/images/articles/' . $filename;

            // If file already exists, reuse it
            if (File::exists($localPath)) {
                return $dbPath;
            }

            // Fetch image content
            $response = Http::timeout(30)->get($url);
            if ($response->successful()) {
                File::put($localPath, $response->body());
                return $dbPath;
            }
        } catch (\Exception $e) {
            $this->warn("   -> Warning: Failed to download image from {$url} - " . $e->getMessage());
        }

        // Return original URL as fallback if download failed
        return $url;
    }

    /**
     * Find inline images in content, download them, and replace source URLs with local paths
     */
    private function processContentImages($content, $slug)
    {
        if (empty($content)) {
            return $content;
        }

        // Find all img tags src attributes
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches);

        if (empty($matches[1])) {
            return $content;
        }

        $count = 1;
        foreach ($matches[1] as $imgUrl) {
            // Only process absolute URLs that seem external
            if (Str::startsWith($imgUrl, 'http')) {
                $this->line("   - Downloading inline image [{$count}]: {$imgUrl}");
                $localUrl = $this->downloadImage($imgUrl, $slug . "-inline-{$count}");
                if ($localUrl) {
                    $content = str_replace($imgUrl, $localUrl, $content);
                }
                $count++;
            }
        }

        return $content;
    }
}
