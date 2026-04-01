<?php

namespace App\Http\Controllers;

use Cp\BlogPost\Models\BlogPost;
use Cp\Gallery\Models\Gallery;
use Cp\Menupage\Models\Page;
use Cp\WebsiteSetting\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SeoController extends Controller
{
    private function siteUrl(): string
    {
        return rtrim(config('app.url') ?: 'https://bayyinahtravels.com', '/');
    }

    private function iso(?string $datetime): ?string
    {
        if (!$datetime) return null;
        try {
            return Carbon::parse($datetime)->toAtomString();
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function sitemap()
    {
        $urls = [];
        $base = $this->siteUrl();

        $add = function (string $loc, ?string $lastmod = null, string $changefreq = 'weekly', string $priority = '0.7') use (&$urls, $base) {
            $urls[] = [
                'loc' => Str::startsWith($loc, 'http') ? $loc : $base . '/' . ltrim($loc, '/'),
                'lastmod' => $lastmod,
                'changefreq' => $changefreq,
                'priority' => $priority,
            ];
        };

        // Static/main
        $add('/', null, 'daily', '1.0');
        $add('/blog', null, 'daily', '0.9');
        $add('/gallery', null, 'weekly', '0.7');

        // Pages
        Page::whereActive(true)->select(['id', 'name', 'updated_at'])->chunk(200, function ($pages) use ($add) {
            foreach ($pages as $p) {
                $slug = function_exists('page_slug') ? page_slug($p->name) : null;
                $loc = route('page', ['id' => $p->id, 'slug' => $slug], false);
                $add($loc, $p->updated_at ? $p->updated_at->toAtomString() : null, 'monthly', '0.6');
            }
        });

        // Blog posts
        BlogPost::whereActive(true)->whereStatus('published')->select(['id', 'slug', 'updated_at', 'title'])->chunk(200, function ($posts) use ($add) {
            foreach ($posts as $post) {
                $slug = $post->slug ?: Str::slug($post->localeTitleShow() ?? 'post');
                $loc = route('singlePost', ['slug' => $slug], false);
                $add($loc, $post->updated_at ? $post->updated_at->toAtomString() : null, 'weekly', '0.8');
            }
        });

        // Galleries (feature pages are all on /gallery, but keep lastmod signal)
        Gallery::whereActive(true)->select(['id', 'updated_at'])->chunk(200, function ($galleries) use ($add) {
            foreach ($galleries as $g) {
                $add('/gallery', $g->updated_at ? $g->updated_at->toAtomString() : null, 'weekly', '0.7');
            }
        });

        $xml = view('seo.sitemap', ['urls' => $urls]);
        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots()
    {
        $base = $this->siteUrl();
        $txt = "User-agent: *\n";
        $txt .= "Disallow: /admin\n";
        $txt .= "Disallow: /login\n";
        $txt .= "Disallow: /register\n";
        $txt .= "Disallow: /password\n";
        $txt .= "Allow: /\n\n";
        $txt .= "Sitemap: {$base}/sitemap.xml\n";

        return response($txt, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function llms()
    {
        $ws = WebsiteSetting::first();
        $base = $this->siteUrl();
        $name = $ws->website_title ?? config('app.name');

        $txt = "# {$name}\n";
        $txt .= "> Official site documentation for AI assistants.\n\n";

        $txt .= "## About\n";
        $txt .= "Bayyinah Travels provides Umrah & Hajj services, visa support, and travel-related services.\n\n";

        $txt .= "## Key pages\n";
        $txt .= "- Home: {$base}/\n";
        $txt .= "- Blog: {$base}/blog\n";
        $txt .= "- Gallery: {$base}/gallery\n";
        $txt .= "- Contact: {$base}/page/2/contact-us\n\n";

        $txt .= "## Sitemap\n";
        $txt .= "- {$base}/sitemap.xml\n\n";

        $txt .= "## Contact\n";
        $txt .= "- Email: contact@bayyinahtravels.com\n";
        $txt .= "- Phone: +8801898878633, +8801898878634, +8801898878635, +8801898878636\n";
        $txt .= "- Address: 301 M M Complex (2nd Floor), Mirpur 2/11, Pallabi, Dhaka-1216\n";

        return response($txt, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}

