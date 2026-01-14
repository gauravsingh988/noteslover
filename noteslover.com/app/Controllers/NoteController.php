<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\RatingModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class NoteController extends BaseController
{
    protected $noteModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();
    }
    
    public function index()
    {
        helper(['text']);

        $categoryModel = new CategoryModel();
        $noteModel     = new NoteModel();

        // Sidebar categories
        $data['categories'] = $categoryModel->where('status', 'active')->findAll();

        // Filters from GET
        $orderby       = $this->request->getGet('orderby') ?? 'date';
        $search        = $this->request->getGet('search');
        $is_premium    = $this->request->getGet('price_type'); // from price_type filter
        $total_pages   = $this->request->getGet('length');
        $date_uploaded = $this->request->getGet('date_uploaded');
        $selectedCategories = $this->request->getGet('category') ?? [];

        // Sort mapping
        $sortField = match($orderby) {
            'download_count' => 'download_count',
            'rating'         => 'average_rating',
            default          => 'id'
        };

        // Build parameters for note query
        $noteQueryParams = [
            'search'         => $search,
            'total_pages'    => $total_pages,
            'is_premium'     => $is_premium === 'premium' ? 1 : ($is_premium === 'free' ? 0 : null),
            'date_uploaded'  => $date_uploaded,
            'sort_by'        => $sortField,
            'sort_dir'       => 'DESC',
            'categories'     => $selectedCategories // new: multi-category support
        ];

        $data['notes']              = $noteModel->getNotesWithRatings($noteQueryParams, 16);
        $data['pager']              = $noteModel->pager;
        $data['orderby']            = $orderby;
        $data['search']             = $search;
        $data['type']               = $is_premium;
        $data['selectedCategories'] = $selectedCategories;
        $data['showCategoryFilter'] = true;

        if ($this->request->isAJAX()) {
            return view('partials/notes_list', $data);
        }

        return $this->render('notes/index', $data);
    }


    public function category($slug = null)
    {
        helper(['text']);
    
        $categoryModel    = new CategoryModel();
        $subCategoryModel = new SubCategoryModel();
        $noteModel        = new NoteModel();
    
        // Step 1: Fetch the main category
        $category = $categoryModel->where('slug', $slug)->first();
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Category not found");
        }
    
        // Step 2: Fetch all active subcategories under this category
        $subCategories = $subCategoryModel
            ->where('category_id', $category['id'])
            ->where('status', 'active')
            ->findAll();
    
        // Step 3: Fetch up to 5 recent notes for each subcategory
        $subCategoryNotes = [];
        foreach ($subCategories as $subCategory) {
            $params = [
                'sub_category_id' => $subCategory['id'],
                'sort_by'         => 'id',
                'sort_dir'        => 'DESC'
            ];
    
            // You can pass more filters here if needed
            $notes = $noteModel->getNotesWithRatings($params, 5);
            $data['pager']      = $noteModel->pager;
            $subCategoryNotes[] = [
                'sub_category' => $subCategory,
                'notes'        => $notes
            ];
        }
    
        // Step 4: Pass all required data to the view
        $data = [
            'categories'        => $categoryModel->where('status', 'active')->findAll(),
            'category'          => $category,
            'subCategoryNotes'  => $subCategoryNotes,
            'orderby'           => $this->request->getGet('orderby'),
            'search'            => $this->request->getGet('search'),
            'type'              => $this->request->getGet('price_type'),
            'selectedCategories'=> [],
            'showCategoryFilter'=> false
        ];
    
        return $this->render('notes/category_listing', $data);
    }


    public function subCategory($catSlug, $subCatSlug)
    {
        helper(['text']);

        $categoryModel    = new CategoryModel();
        $subCategoryModel = new SubCategoryModel();
        $noteModel        = new NoteModel();

        $data['categories'] = $categoryModel->where('status', 'active')->findAll();

        $orderby       = $this->request->getGet('orderby') ?? 'date';
        $search        = $this->request->getGet('search');
        $is_premium    = $this->request->getGet('price_type');
        $total_pages   = $this->request->getGet('length');
        $date_uploaded = $this->request->getGet('date_uploaded');

        $sortField = match($orderby) {
            'download_count' => 'download_count',
            'rating'         => 'average_rating',
            default          => 'id'
        };

        $category = $categoryModel->where('slug', $catSlug)->first();
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Category not found");
        }

        $subCategory = $subCategoryModel
            ->where('slug', $subCatSlug)
            ->where('category_id', $category['id'])
            ->first();

        if (!$subCategory) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Subcategory not found");
        }

        $noteQueryParams = [
            'search'          => $search,
            'total_pages'     => $total_pages,
            'is_premium'      => $is_premium === 'premium' ? 1 : ($is_premium === 'free' ? 0 : null),
            'date_uploaded'   => $date_uploaded,
            'sort_by'         => $sortField,
            'sort_dir'        => 'DESC',
            'sub_category_id' => $subCategory['id']
        ];

        $data['notes']              = $noteModel->getNotesWithRatings($noteQueryParams, 16);
            $data['pager']      = $noteModel->pager;

        $data['orderby']            = $orderby;
        $data['search']             = $search;
        $data['type']               = $is_premium;
        $data['category']           = $category['name'];
        $data['sub_category']       = $subCategory['name'];
        $data['selectedCategories'] = [];
        $data['showCategoryFilter'] = false;

        if ($this->request->isAJAX()) {
            return view('partials/notes_list', $data);
        }

        return $this->render('notes/index', $data);
    }

    public function details($slug)
    {
        helper(['text']);

        $noteModel     = new NoteModel();
        $categoryModel = new CategoryModel();
        $ratingModel   = new RatingModel();

        $session = session();
        $user    = $session->get('user');
        $userId  = $user['id'] ?? null;

        // Sidebar categories
        $data['trending_categories'] = $categoryModel
            ->where('status', 'active')
            ->where('is_trending', '1')
            ->findAll();

        // Fetch main note
        $data['note'] = $noteModel
            ->select('notes.*, 
                    categories.name as category_name, 
                    users.username as user_name, 
                    sub_categories.name as sub_category_name, 
                    ROUND(AVG(ratings.rating), 1) as average_rating, 
                    COUNT(ratings.id) as total_reviews')
            ->join('categories', 'categories.id = notes.category_id', 'left')
            ->join('sub_categories', 'sub_categories.id = notes.sub_category_id', 'left')
            ->join('ratings', 'ratings.note_id = notes.id', 'left')
            ->join('users', 'users.id = notes.uploaded_by', 'left')
            ->where('notes.slug', $slug)
            ->groupBy('notes.id')
            ->first();
        if (!$data['note']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Note not found");
        }

        $noteId = $data['note']['id'];

        // Set user status flags
        $data['has_liked']    = $userId ? $noteModel->hasUserLiked($noteId, $userId) : false;
        $data['has_disliked'] = $userId ? $noteModel->hasUserDisliked($noteId, $userId) : false;
        $data['has_saved']    = $userId ? $noteModel->hasUserSaved($noteId, $userId) : false;

        // Set Meta Details
        $data['meta_title'] = $data['note']['meta_title'];
        $data['meta_description'] = $data['note']['meta_description'];
        $data['meta_keywords'] = $data['note']['meta_keywords'];
        $data['canonical_url'] = $data['note']['canonical_url'];

        // Related products
        $data['related_products'] = $noteModel
            ->select('notes.*, 
                    categories.name as category_name, 
                    sub_categories.name as sub_category_name, 
                    ROUND(AVG(ratings.rating), 1) as average_rating, 
                    COUNT(ratings.id) as total_reviews')
            ->join('categories', 'categories.id = notes.category_id', 'left')
            ->join('sub_categories', 'sub_categories.id = notes.sub_category_id', 'left')
            ->join('ratings', 'ratings.note_id = notes.id', 'left')
            ->where('notes.category_id', $data['note']['category_id'])
            ->where('notes.id !=', $data['note']['id'])
            ->groupBy('notes.id')
            ->limit(5)
            ->findAll();

        // Featured notes
        $data['featured_notes'] = $noteModel
            ->select('notes.*, 
                    ROUND(AVG(ratings.rating), 1) as average_rating, 
                    COUNT(ratings.id) as total_reviews')
            ->join('ratings', 'ratings.note_id = notes.id', 'left')
            ->where('notes.is_featured', '1')
            ->groupBy('notes.id')
            ->limit(5)
            ->findAll();

        // Reviews
        $ratingModel = new \App\Models\RatingModel();
        $data['reviews'] = $ratingModel->getReviewsWithUser($noteId);

        // Increment view count (with session check to prevent spam)
        $this->incrementViews($noteModel, $noteId);

        return $this->render('notes/details', $data);
    }

    public function markReport($slug)
    {
        // 1️⃣ Check if user is logged in
        if (!session()->has('user')) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'redirect' => base_url('login')
                ]);
            }
            return redirect()->to('login');
        }
    
        // 2️⃣ Get note by slug
        $noteModel = new \App\Models\NoteModel();
        $note = $noteModel->where('slug', $slug)->first();
    
        if (!$note) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Note not found'
            ]);
        }
    
        // 3️⃣ Collect input
        $reason  = $this->request->getPost('reason_category'); // from radio
        $details = $this->request->getPost('details');         // optional text
    
        if (empty($reason)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please select a reason'
            ]);
        }
    
        // 4️⃣ Try saving inside try-catch
        try {
            $reportModel = new \App\Models\ReportModel();
            $reportModel->save([
                'note_id' => $note['id'],
                'user_id' => session()->get('user')['id'],
                'reason'  => $reason,
                'details' => $details
            ]);
    
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Your report has been submitted.'
            ]);
    
        } catch (\Exception $e) {
            log_message('error', 'Report save failed: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save your report. Please try again later.'
            ]);
        }
    }

    public function download($slug)
    {
        $session = session();
        $noteModel = new NoteModel();
        
        // Get the note
        $note = $noteModel
            ->select('id, title, slug, file_path, download_count')
            ->where('slug', $slug)
            ->first();
        if (!$note) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Note not found.");
        }
        $downloadedKey = 'downloaded_note_' . $note['id'];
        if (!$session->get($downloadedKey)) {
            // Update download count
            $noteModel->update($note['id'], [
                'download_count' => $note['download_count'] + 1
            ]);

            $session->set($downloadedKey, true);
        }

        // Return the file as a download
        return redirect()->to($note['file_path']);
    }

    public function submitRating($noteId)
    {
        $ratingModel = new \App\Models\RatingModel();
    
        if ($this->request->isAJAX()) {
            $rating  = (int) $this->request->getPost('rating');
            $message = trim($this->request->getPost('message'));
            $uid    = session()->get('user')['id'];

            if (empty($message) || $rating <= 0) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Please provide both a rating and a message.'
                ]);
            }
    
            $saveData = [
                'note_id'  => $noteId,
                'user_id'  => $uid,
                'message'  => $message,
                'rating'   => $rating,
            ];
    
            if ($ratingModel->insert($saveData)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Your review has been submitted successfully!'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unable to save your review. Please try again.'
                ]);
            }
        }
    
        return redirect()->back()->with('error', 'Invalid request.');
    }



    public function like()
    {
        $session = session();
        $user = $session->get('user');
        $json = $this->request->getJSON();

        if (!$user || !isset($user['id'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Login required']);
        }

        $noteId = $json->note_id ?? null;
        $userId = $user['id'];

        if (!$noteId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid note ID']);
        }

        if ($this->noteModel->hasUserLiked($noteId, $userId)) {
            // User already liked — remove like
            $this->noteModel->removeLike($noteId, $userId);
            $action = 'unliked';
        } else {
            // Remove dislike if exists
            if ($this->noteModel->hasUserDisliked($noteId, $userId)) {
                $this->noteModel->removeDislike($noteId, $userId);
            }
            $this->noteModel->addLike($noteId, $userId);
            $action = 'liked';
        }

        return $this->response->setJSON(['success' => true, 'action' => $action]);
    }

    public function dislike()
    {
        $session = session();
        $user = $session->get('user');
        $json = $this->request->getJSON();

        if (!$user || !isset($user['id'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Login required']);
        }

        $noteId = $json->note_id ?? null;
        $userId = $user['id'];

        if (!$noteId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid note ID']);
        }

        if ($this->noteModel->hasUserDisliked($noteId, $userId)) {
            // User already disliked — remove dislike
            $this->noteModel->removeDislike($noteId, $userId);
            $action = 'undisliked';
        } else {
            // Remove like if exists
            if ($this->noteModel->hasUserLiked($noteId, $userId)) {
                $this->noteModel->removeLike($noteId, $userId);
            }
            $this->noteModel->addDislike($noteId, $userId);
            $action = 'disliked';
        }

        return $this->response->setJSON(['success' => true, 'action' => $action]);
    }

    public function saveUnsave()
    {
        $session = session();
        $user = $session->get('user');
        $json = $this->request->getJSON();

        if (!$user || !isset($user['id'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Login required']);
        }

        $noteId = $json->note_id ?? null;
        $userId = $user['id'];

        if (!$noteId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid note ID']);
        }

        if ($this->noteModel->hasUserSaved($noteId, $userId)) {
            $this->noteModel->unsaveNote($noteId, $userId);
            return $this->response->setJSON(['success' => true, 'action' => 'unsaved']);
        } else {
            $this->noteModel->saveNote($noteId, $userId);
            return $this->response->setJSON(['success' => true, 'action' => 'saved']);
        }
    }

    public function autocomplete()
    {
        $query = $this->request->getGet('query');
        $model = new NoteModel();

        $results = $model
            ->select('id, title, slug')
            ->like('title', $query)
            ->where('is_deleted', '0')
            ->where('status', '1')
            ->limit(10)
            ->findAll();
        return $this->response->setJSON($results);
    }

    private function incrementViews($model, $noteId)
    {
        try {
            $session = session();
            $viewedNotes = $session->get('viewed_notes') ?? [];
    
            if (!in_array($noteId, $viewedNotes)) {
    
                // Update view count safely
                $model->where('id', $noteId)
                      ->set('views', 'views + 1', false)
                      ->update();
    
                // Add note ID to session
                $viewedNotes[] = $noteId;
                $session->set('viewed_notes', $viewedNotes);
            }
        } catch (\Throwable $e) {
            // Silent failure — nothing happens
            // You can log it if you want:
            // log_message('error', 'incrementViews failed: ' . $e->getMessage());
        }
    }
}
