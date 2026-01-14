<?php
namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    protected $storyModel;

    public function __construct()
    {
        $this->storyModel = new PostModel();
    }

    public function index()
    {
        helper('text');
        $model = new PostModel();
        $request = service('request');

        // Get filters
        $category     = $request->getGet('category');
        $dateUploaded = $request->getGet('date_uploaded');
        $status       = $request->getGet('status') ?? 'active';
        $sortBy       = $request->getGet('sort_by') ?? 'id';
        $sortOrder    = $request->getGet('sort_order') ?? 'DESC';

        // Apply filters
        $model->where('status', $status);
        $model->where('type', 'story');

        if (!empty($category)) {
            $model->where('category', $category);
        }

        if (!empty($dateUploaded)) {
            $date = match($dateUploaded) {
                'last_week'     => date('Y-m-d', strtotime('-1 week')),
                'last_month'    => date('Y-m-d', strtotime('-1 month')),
                'last_3_month'  => date('Y-m-d', strtotime('-3 months')),
                'last_6_month'  => date('Y-m-d', strtotime('-6 months')),
                'last_year'     => date('Y-m-d', strtotime('-1 year')),
                default         => null,
            };
            if ($date) {
                $model->where('created_at >=', $date);
            }
        }

        // Sorting
        $model->orderBy($sortBy, $sortOrder);

        // Paginate
        $perPage = 10;
        $stories = $model->paginate($perPage);
        $pager = $model->pager;

        $data = [
            'heading'           => 'Dreams Delivered',
            'paragraph'         => 'Every dream here began with a challenge and ended with a milestone worth celebrating.',
            'success_stories'   => $stories,
            'pager'             => $pager,
            'filters'           => [
                'category'      => $category,
                'date_uploaded' => $dateUploaded,
                'status'        => $status,
                'sort_by'       => $sortBy,
                'sort_order'    => $sortOrder,
            ],
            'categories' => [ 'inspiration', 'education', 'career', 'health', 'other' ],
        ];

        // If AJAX, return only partial (the list + pager)
        if ($request->isAJAX()) {
            return $this->render('success_stories/_list_partial', $data);
        }

        // Otherwise full page
        return $this->render('success_stories/index', $data);
    }
    public function details($slug)
    {
        $session = session();
        $user    = $session->get('user');
        $userId  = $user['id'] ?? null;

        $storyModel = new PostModel(); // renamed for clarity

        // Get the main story
        $data['story'] = $storyModel->where('slug', $slug)
            ->where('is_deleted', '0')
            ->where('status', 'active')
            ->first();
        // If not found, redirect or show 404
        if (!$data['story']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Not found");
        }

        $storyId = $data['story']['id'];
        // Increment view count (with session check to prevent spam)
        $this->incrementViews($storyModel, $storyId);

        // Set user status flags
        $data['has_liked']    = $userId ? $storyModel->hasUserLiked($storyId, $userId) : false;
        $data['has_disliked'] = $userId ? $storyModel->hasUserDisliked($storyId, $userId) : false;
        $data['has_saved']    = $userId ? $storyModel->hasUserSaved($storyId, $userId) : false;

        // Related stories (excluding current)
        $data['recent_model_papers'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'model_paper')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_blogs'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'blog')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_stories'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'story')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories


        // Set Meta Details
        $data['meta_title'] = $data['story']['meta_title'];
        $data['meta_description'] = $data['story']['meta_description'];
        $data['meta_keywords'] = $data['story']['meta_keywords'];
        $data['canonical_url'] = $data['story']['canonical_url'];

        return $this->render('success_stories/details', $data);
    }


    public function blog_index()
    {
        helper('text');
        $model = new PostModel();
        $request = service('request');

        // Get filters
        $category     = $request->getGet('category');
        $dateUploaded = $request->getGet('date_uploaded');
        $status       = $request->getGet('status') ?? 'active';
        $sortBy       = $request->getGet('sort_by') ?? 'id';
        $sortOrder    = $request->getGet('sort_order') ?? 'DESC';

        // Apply filters
        $model->where('status', $status);
        $model->where('type', 'blog');

        if (!empty($category)) {
            $model->where('category', $category);
        }

        if (!empty($dateUploaded)) {
            $date = match($dateUploaded) {
                'last_week'     => date('Y-m-d', strtotime('-1 week')),
                'last_month'    => date('Y-m-d', strtotime('-1 month')),
                'last_3_month'  => date('Y-m-d', strtotime('-3 months')),
                'last_6_month'  => date('Y-m-d', strtotime('-6 months')),
                'last_year'     => date('Y-m-d', strtotime('-1 year')),
                default         => null,
            };
            if ($date) {
                $model->where('created_at >=', $date);
            }
        }

        // Sorting
        $model->orderBy($sortBy, $sortOrder);

        // Paginate
        $perPage = 10;
        $stories = $model->paginate($perPage);
        $pager = $model->pager;

        $data = [
            'heading'           => 'Fresh Reads',
            'paragraph'         => 'Stay updated with trending topics, expert guidance, and inspiring content from our latest blog entries.',
            'success_stories'   => $stories,
            'pager'             => $pager,
            'filters'           => [
                'category'      => $category,
                'date_uploaded' => $dateUploaded,
                'status'        => $status,
                'sort_by'       => $sortBy,
                'sort_order'    => $sortOrder,
            ],
            'categories' => [ 'inspiration', 'education', 'career', 'health', 'other' ],
        ];

        // If AJAX, return only partial (the list + pager)
        if ($request->isAJAX()) {
            return $this->render('blogs/_list_partial', $data);
        }

        // Otherwise full page
        return $this->render('blogs/index', $data);
    }

    public function blog_details($slug)
    {
        $session = session();
        $user    = $session->get('user');
        $userId  = $user['id'] ?? null;

        $storyModel = new PostModel(); // renamed for clarity

        // Get the main story
        $data['story'] = $storyModel->where('slug', $slug)
            ->where('is_deleted', '0')
            ->where('status', 'active')
            ->first();
        // If not found, redirect or show 404
        if (!$data['story']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Not found");
        }

        $storyId = $data['story']['id'];
        // Increment view count (with session check to prevent spam)
        $this->incrementViews($storyModel, $storyId);

        // Set user status flags
        $data['has_liked']    = $userId ? $storyModel->hasUserLiked($storyId, $userId) : false;
        $data['has_disliked'] = $userId ? $storyModel->hasUserDisliked($storyId, $userId) : false;
        $data['has_saved']    = $userId ? $storyModel->hasUserSaved($storyId, $userId) : false;

        // Related stories (excluding current)
        $data['recent_model_papers'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'model_paper')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_blogs'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'blog')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_stories'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'story')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Set Meta Details
        $data['meta_title'] = $data['story']['meta_title'];
        $data['meta_description'] = $data['story']['meta_description'];
        $data['meta_keywords'] = $data['story']['meta_keywords'];
        $data['canonical_url'] = $data['story']['canonical_url'];

        return $this->render('blogs/details', $data);
    }


    public function model_paper_index()
    {

        helper('text');
        $model = new PostModel();
        $request = service('request');

        // Apply filters
        $model->where('status', 'active');
        $model->where('type', 'model_paper');
        $model->orderBy('created_at', "ASC");

        // Paginate
        $perPage = 10;
        $model_papers = $model->paginate($perPage);
        $pager = $model->pager;

        $data = [
            'heading'   => 'Model Papers',
            'paragraph' => 'Access comprehensive model papers, practice questions, and solved examples to excel in your exams and stay ahead in your preparation.',
            'model_papers'   => $model_papers,
            'pager'             => $pager,
        ];
        return $this->render('model_papers/index', $data);
    }
    
    public function model_paper_details(string $slug)
    {
        $session = session();
        $user    = $session->get('user');
        $userId  = $user['id'] ?? null;

        $storyModel = new PostModel(); // renamed for clarity

        // Get the main story
        $data['story'] = $storyModel->where('slug', $slug)
            ->where('is_deleted', '0')
            ->where('status', 'active')
            ->first();
        // If not found, redirect or show 404
        if (!$data['story']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Not found");
        }

        $storyId = $data['story']['id'];
        // Increment view count (with session check to prevent spam)
        $this->incrementViews($storyModel, $storyId);

        // Set user status flags
        $data['has_liked']    = $userId ? $storyModel->hasUserLiked($storyId, $userId) : false;
        $data['has_disliked'] = $userId ? $storyModel->hasUserDisliked($storyId, $userId) : false;
        $data['has_saved']    = $userId ? $storyModel->hasUserSaved($storyId, $userId) : false;

        // Related stories (excluding current)
        $data['recent_model_papers'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'model_paper')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_blogs'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'blog')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Related stories (excluding current)
        $data['recent_stories'] = $storyModel->where('is_deleted', '0')
            ->where('status', 'active')
            ->where('type', 'blog')
            ->where('id !=', $storyId)
            ->orderBy('id', 'DESC')
            ->findAll(5); // Limit to 6 related stories

        // Set Meta Details
        $data['meta_title'] = $data['story']['meta_title'];
        $data['meta_description'] = $data['story']['meta_description'];
        $data['meta_keywords'] = $data['story']['meta_keywords'];
        $data['canonical_url'] = $data['story']['canonical_url'];

        return $this->render('model_papers/details', $data);

    }

    private function incrementViews($model, $storyId)
    {
        $session = session();
        $viewedStory = $session->get('viewed_story') ?? [];

        if (!in_array($storyId, $viewedStory)) {
            // Update view count
            $model->where('id', $storyId)->set('total_views', 'total_views + 1', false)->update();

            // Add story ID to session
            $viewedStory[] = $storyId;
            $session->set('viewed_story', $viewedStory);
        }
    }

    public function like()
    {
        $session = session();
        $user = $session->get('user');
        $json = $this->request->getJSON();

        if (!$user || !isset($user['id'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Login required']);
        }

        $storyId = $json->story_id ?? null;
        $userId = $user['id'];

        if (!$storyId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid story ID']);
        }

        if ($this->storyModel->hasUserLiked($storyId, $userId)) {
            // User already liked — remove like
            $this->storyModel->removeLike($storyId, $userId);
            $action = 'unliked';
        } else {
            // Remove dislike if exists
            if ($this->storyModel->hasUserDisliked($storyId, $userId)) {
                $this->storyModel->removeDislike($storyId, $userId);
            }
            $this->storyModel->addLike($storyId, $userId);
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

        $storyId = $json->story_id ?? null;
        $userId = $user['id'];

        if (!$storyId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid story ID']);
        }

        if ($this->storyModel->hasUserDisliked($storyId, $userId)) {
            // User already disliked — remove dislike
            $this->storyModel->removeDislike($storyId, $userId);
            $action = 'undisliked';
        } else {
            // Remove like if exists
            if ($this->storyModel->hasUserLiked($storyId, $userId)) {
                $this->storyModel->removeLike($storyId, $userId);
            }
            $this->storyModel->addDislike($storyId, $userId);
            $action = 'disliked';
        }

        return $this->response->setJSON(['success' => true, 'action' => $action]);
    }
}
