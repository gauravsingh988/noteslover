<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table      = 'notes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'slug',
        'description',
        'file_path',
        'preview_file_path',
        'drive_file_link_id',
        'thumbnail',
        'is_premium',
        'price',
        'uploaded_by',
        'category_id',
        'sub_category_id',
        'language',
        'download_count',
        'tags',
        'is_featured',
        'views',
        'total_likes',
        'total_dislikes',
        'total_pages'
    ];

    public function getNotesWithCategoryNames()
    {
        return $this->db->table($this->table)
            ->select('
                notes.*, 
                categories.name as category_name, 
                sub_categories.name as sub_category_name,
                ROUND(AVG(ratings.rating), 1) as average_rating,
                COUNT(ratings.id) as total_reviews
            ')
            ->join('categories', 'categories.id = notes.category_id', 'left')
            ->join('sub_categories', 'sub_categories.id = notes.sub_category_id', 'left')
            ->join('ratings', 'ratings.note_id = notes.id', 'left')
            ->groupBy('notes.id')
            ->get()
            ->getResultArray();
    }

    public function getNotesWithRatings($params = [], $limit = 16)
    {
        // Start with MODEL query builder – REQUIRED for paginate()
        $builder = $this->select('
            notes.*, 
            categories.name as category_name, 
            users.username as user_name,
            users.full_name as uploader_name,
            COALESCE(ROUND(AVG(ratings.rating), 1), 0) as average_rating,
            COUNT(ratings.id) as total_reviews
        ')
        ->join('categories', 'categories.id = notes.category_id', 'left')
        ->join('ratings', 'ratings.note_id = notes.id', 'left')
        ->join('users', 'users.id = notes.uploaded_by', 'left')
        ->groupBy('notes.id');

    
    
        /* ---------------------------------------------------
           1. Search Filter
        --------------------------------------------------- */
        if (!empty($params['search'])) {
            $builder->groupStart()
                ->like('notes.title', $params['search'])
                ->orLike('notes.description', $params['search'])
            ->groupEnd();
        }
    
    
        /* ---------------------------------------------------
           2. Total Pages Filter
        --------------------------------------------------- */
        if (!empty($params['total_pages'])) {
            $total_pages = $params['total_pages'];
    
            if (strpos($total_pages, '+') !== false) {
                $min_pages = (int) rtrim($total_pages, '+');
                $builder->where('notes.total_pages >=', $min_pages);
    
            } elseif (strpos($total_pages, '_') !== false) {
                [$min_pages, $max_pages] = explode('_', $total_pages);
                $builder->where('notes.total_pages >=', (int) $min_pages);
                $builder->where('notes.total_pages <=', (int) $max_pages);
    
            } else {
                $builder->where('notes.total_pages', (int) $total_pages);
            }
        }
    
    
        /* ---------------------------------------------------
           3. Premium / Free Filter
        --------------------------------------------------- */
        if (isset($params['is_premium']) && in_array($params['is_premium'], [0, 1], true)) {
            $builder->where('notes.is_premium', $params['is_premium']);
        }
    
    
        /* ---------------------------------------------------
           4. Date Uploaded Filter
        --------------------------------------------------- */
        if (!empty($params['date_uploaded'])) {
            $dateFilter = strtolower(str_replace(' ', '_', $params['date_uploaded']));
            $startDate = null;
    
            switch ($dateFilter) {
                case 'last_week':
                    $startDate = date('Y-m-d H:i:s', strtotime('-1 week'));
                    break;
    
                case 'last_month':
                    $startDate = date('Y-m-d H:i:s', strtotime('-1 month'));
                    break;
    
                case 'last_3_month':
                    $startDate = date('Y-m-d H:i:s', strtotime('-3 months'));
                    break;
    
                case 'last_6_month':
                    $startDate = date('Y-m-d H:i:s', strtotime('-6 months'));
                    break;
    
                case 'last_year':
                    $startDate = date('Y-m-d H:i:s', strtotime('-1 year'));
                    break;
            }
    
            if ($startDate) {
                $builder->where('notes.created_at >=', $startDate);
            }
        }
    
    
        /* ---------------------------------------------------
           5. Category Filter (Multi-category)
        --------------------------------------------------- */
        if (!empty($params['categories']) && is_array($params['categories'])) {
            $builder->whereIn('notes.category_id', $params['categories']);
        }

        /* ---------------------------------------------------
           6. Sub Category Filter (Sub-category)
        --------------------------------------------------- */
        if (!empty($params['sub_category_id'])) {
            $builder->where('notes.sub_category_id', $params['sub_category_id']);
        }    
    
        /* ---------------------------------------------------
           6. Sorting
        --------------------------------------------------- */
        $sortBy  = $params['sort_by'] ?? 'notes.id';
        $sortDir = $params['sort_dir'] ?? 'DESC';
    
    
        /* ---------------------------------------------------
           7. RETURN PAGINATED RESULT (IMPORTANT)
        --------------------------------------------------- */
        return $builder->orderBy($sortBy, $sortDir)->paginate($limit, 'notes_pagination');
    }


    public function addLike($noteId, $userId)
    {
        $this->db->transStart();

        // Prevent duplicate entry
        $this->db->table('note_likes')->replace([
            'note_id' => $noteId,
            'user_id' => $userId
        ]);

        // Increment total_likes
        $this->db->table('notes')
            ->where('id', $noteId)
            ->set('total_likes', 'total_likes + 1', false)
            ->update();

        $this->db->transComplete();
    }


    public function addDislike($noteId, $userId)
    {
        $this->db->transStart();

        // Prevent duplicate entry
        $this->db->table('note_dislikes')->replace([
            'note_id' => $noteId,
            'user_id' => $userId
        ]);

        // Increment total_dislikes
        $this->db->table('notes')
            ->where('id', $noteId)
            ->set('total_dislikes', 'total_dislikes + 1', false)
            ->update();

        $this->db->transComplete();
    }

    public function hasUserLiked($noteId, $userId)
    {
        return $this->db->table('note_likes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->countAllResults() > 0;
    }

    public function hasUserDisliked($noteId, $userId)
    {
        return $this->db->table('note_dislikes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->countAllResults() > 0;
    }

    public function removeLike($noteId, $userId)
    {
        $this->db->transStart();

        // Delete like record
        $this->db->table('note_likes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->delete();

        // Decrease likes, not below 0
        $this->db->table('notes')
            ->where('id', $noteId)
            ->set('total_likes', 'GREATEST(total_likes - 1, 0)', false)
            ->update();

        $this->db->transComplete();
    }

    public function removeDislike($noteId, $userId)
    {
        $this->db->transStart();

        $this->db->table('note_dislikes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->delete();

        $this->db->table('notes')
            ->where('id', $noteId)
            ->set('total_dislikes', 'GREATEST(total_dislikes - 1, 0)', false)
            ->update();

        $this->db->transComplete();
    }

    public function saveNote($noteId, $userId)
    {
        $this->db->table('saved_notes')->replace([
            'note_id' => $noteId,
            'user_id' => $userId
        ]);
    }

    public function unsaveNote($noteId, $userId)
    {
        $this->db->table('saved_notes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->delete();
    }

    public function hasUserSaved($noteId, $userId)
    {
        return $this->db->table('saved_notes')
            ->where(['note_id' => $noteId, 'user_id' => $userId])
            ->countAllResults() > 0;
    }
}
