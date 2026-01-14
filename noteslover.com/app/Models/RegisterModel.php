<?php
namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'registeruser';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'password'
    ];

    protected $useTimestamps = false; // DB auto handles created_at
}
