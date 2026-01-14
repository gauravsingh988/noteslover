<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';

    // Include 'details' so it can be saved from controller
    protected $allowedFields = ['note_id', 'user_id', 'reason', 'details', 'created_at'];

    // Automatically handle timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // disable updated_at since not needed

    // Optional: validation rules (good for security)
    protected $validationRules = [
        'note_id' => 'required|integer',
        'user_id' => 'required|integer',
        'reason'  => 'required|string|max_length[255]',
        'details' => 'permit_empty|string|max_length[1000]',
    ];

    protected $validationMessages = [
        'reason' => [
            'required' => 'Please provide a reason for your report.',
        ],
    ];

    protected $skipValidation = false;
}
