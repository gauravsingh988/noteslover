<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestedNotesModel extends Model
{
    protected $table = 'requested_notes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'notes_request', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';

}
