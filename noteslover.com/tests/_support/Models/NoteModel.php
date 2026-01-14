<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table      = 'notes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title', 'slug', 'description', 'file_path', 'is_premium',
        'uploaded_by', 'category_id', 'sub_category_id', 'language', 'download_count'
    ];
}
