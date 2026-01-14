<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';  // your ratings table name
    protected $primaryKey = 'id';

    protected $allowedFields = ['note_id', 'user_id', 'message', 'rating', 'created_at'];

    protected $useTimestamps = true; // automatically set created_at/updated_at if those fields exist
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function getReviewsWithUser($noteId)
    {
        return $this->db->table('ratings')
            ->select('
                ratings.id,
                ratings.note_id,
                ratings.message,
                ratings.rating,
                ratings.created_at,
                users.id as user_id,
                users.username,
                users.full_name,
                users.profile_pic
            ')
            ->join('users', 'users.id = ratings.user_id', 'left')
            ->where('ratings.note_id', $noteId)
            ->orderBy('ratings.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}
