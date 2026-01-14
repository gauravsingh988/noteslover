<?php
namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $table = 'partners';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'notes_category',
        'message'
    ];

    // Auto timestamps if your table has created_at & updated_at
    protected $useTimestamps = true;
}
