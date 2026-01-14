<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CategoryModel;
use App\Models\NoteModel;


abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // You can preload services/models here
    }

    /**
     * Shared render function to include header and footer
     */
protected function render(string $view, array $data = []): void
{
    $categoryModel = new \App\Models\CategoryModel();
    $subCategoryModel = new \App\Models\SubCategoryModel();

    // Load active top-level header categories (only id, name, slug)
    $headerCategories = $categoryModel
        ->select('id, name, slug')
        ->where('status', 'active')
        ->where('is_in_header', '1')
        ->find();

    // Load active subcategories (only id, name, slug, category_id)
    $subCategories = $subCategoryModel
        ->select('id, name, slug, category_id')
        ->where('status', 'active')
        ->find();

    // Group subcategories by their parent category_id
    $groupedSubcategories = [];
    foreach ($subCategories as $sub) {
        $groupedSubcategories[$sub['category_id']][] = $sub;
    }

    // Attach subcategories to the parent categories
    foreach ($headerCategories as &$cat) {
        $cat['children'] = $groupedSubcategories[$cat['id']] ?? [];
    }

    $data['header_categories'] = $headerCategories;
    // Footer categories (if needed) — also fetch limited fields
    $data['footer_categories'] = $categoryModel
        ->select('id, name, slug')
        ->where('status', 'active')
        ->where('is_in_footer', '1')
        ->find();

    // For debugging


    // Render views
    echo view('includes/header', $data);
    echo view($view, $data);
    echo view('includes/footer', $data);
}


}
