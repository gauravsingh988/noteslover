<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\SuccessStoryModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use CodeIgniter\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $noteModel        = new NoteModel();
        $storyModel       = new SuccessStoryModel();
        $categoryModel    = new CategoryModel();
        $subCategoryModel = new SubCategoryModel();

        $baseUrl = base_url();

        // Fetch all active notes
        $notes = $noteModel->where('status', 'active')->findAll();

        // Fetch active success stories and blogs
        $successStories = $storyModel->where('status', 'active')
                                     ->where('type', 'story')
                                     ->findAll();

        $blogs = $storyModel->where('status', 'active')
                            ->where('type', 'blog')
                            ->findAll();

        // Fetch categories & subcategories
        $categories    = $categoryModel->where('status', 'active')->findAll();
        // $subCategories = $subCategoryModel->where('status', 'active')->findAll();
        $subCategories = $subCategoryModel
            ->select('sub_categories.slug as sub_slug, categories.slug as cat_slug, sub_categories.updated_at, sub_categories.created_at')
            ->join('categories', 'categories.id = sub_categories.category_id', 'left')
            ->where('sub_categories.status', 'active')
            ->findAll();


        // Start XML
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Home page
        $xml .= "
        <url>
            <loc>{$baseUrl}</loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>";

        // Notes URLs
        foreach ($notes as $note) {
            $lastMod = $note['updated_at'] ?? $note['created_at'] ?? date('Y-m-d');
            $xml .= "
            <url>
                <loc>{$baseUrl}notes/{$note['slug']}</loc>
                <lastmod>".date('Y-m-d', strtotime($lastMod))."</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>";
        }

        // Blogs URLs (type = blog)
        foreach ($blogs as $blog) {
            $lastMod = $blog['updated_at'] ?? $blog['created_at'] ?? date('Y-m-d');
            $xml .= "
            <url>
                <loc>{$baseUrl}blogs/{$blog['slug']}</loc>
                <lastmod>".date('Y-m-d', strtotime($lastMod))."</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.7</priority>
            </url>";
        }

        // Success Stories URLs (type = story)
        foreach ($successStories as $story) {
            $lastMod = $story['updated_at'] ?? $story['created_at'] ?? date('Y-m-d');
            $xml .= "
            <url>
                <loc>{$baseUrl}success-stories/{$story['slug']}</loc>
                <lastmod>".date('Y-m-d', strtotime($lastMod))."</lastmod>
                <changefreq>monthly</changefreq>
                <priority>0.7</priority>
            </url>";
        }

        // Categories
        foreach ($categories as $cat) {
            $xml .= "
            <url>
                <loc>{$baseUrl}{$cat['slug']}</loc>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>";
        }

        // Subcategories
        foreach ($subCategories as $subCat) {
            $lastMod = $subCat['updated_at'] ?? $subCat['created_at'] ?? date('Y-m-d');
            $xml .= "
            <url>
                <loc>{$baseUrl}{$subCat['cat_slug']}/{$subCat['sub_slug']}</loc>
                <lastmod>" . date('Y-m-d', strtotime($lastMod)) . "</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>";
        }

        $xml .= '</urlset>';

        return $this->response
                    ->setHeader('Content-Type', 'application/xml')
                    ->setBody($xml);
    }
}
