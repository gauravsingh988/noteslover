<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'slug',
        'status',
        'thumbnail',
        'description',
        'is_deleted',
        'total_like',
        'total_dislike',
        'total_views',
    ];



    public function addLike($noteId, $userId)
    {
        $this->db->transStart();

        // Prevent duplicate entry
        $this->db->table('story_likes')->replace([
            'story_id' => $noteId,
            'user_id' => $userId
        ]);

        // Increment total_likes
        $this->db->table('posts')
            ->where('id', $noteId)
            ->set('total_likes', 'total_likes + 1', false)
            ->update();

        $this->db->transComplete();
    }


    public function addDislike($noteId, $userId)
    {
        $this->db->transStart();

        // Prevent duplicate entry
        $this->db->table('story_dislikes')->replace([
            'story_id' => $noteId,
            'user_id' => $userId
        ]);

        // Increment total_dislikes
        $this->db->table('posts')
            ->where('id', $noteId)
            ->set('total_dislikes', 'total_dislikes + 1', false)
            ->update();

        $this->db->transComplete();
    }

    public function hasUserLiked($noteId, $userId)
    {
        return $this->db->table('story_likes')
            ->where(['story_id' => $noteId, 'user_id' => $userId])
            ->countAllResults() > 0;
    }

    public function hasUserDisliked($noteId, $userId)
    {
        return $this->db->table('story_dislikes')
            ->where(['story_id' => $noteId, 'user_id' => $userId])
            ->countAllResults() > 0;
    }

    public function removeLike($noteId, $userId)
    {
        $this->db->transStart();

        // Delete like record
        $this->db->table('story_likes')
            ->where(['story_id' => $noteId, 'user_id' => $userId])
            ->delete();

        // Decrease likes, not below 0
        $this->db->table('posts')
            ->where('id', $noteId)
            ->set('total_likes', 'GREATEST(total_likes - 1, 0)', false)
            ->update();

        $this->db->transComplete();
    }

    public function removeDislike($noteId, $userId)
    {
        $this->db->transStart();

        $this->db->table('story_dislikes')
            ->where(['story_id' => $noteId, 'user_id' => $userId])
            ->delete();

        $this->db->table('posts')
            ->where('id', $noteId)
            ->set('total_dislikes', 'GREATEST(total_dislikes - 1, 0)', false)
            ->update();

        $this->db->transComplete();
    }
}
