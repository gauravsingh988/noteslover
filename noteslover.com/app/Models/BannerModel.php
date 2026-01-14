<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table      = 'banners';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'slug',
        'thumbnail',
        'url',
        'status'
    ];

    // Optional: timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
