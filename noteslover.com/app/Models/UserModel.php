<?php
// app/Models/UserModel.php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $table      = 'users';
    protected $primaryKey = 'id';

    // Add all profile-related fields here
    protected $allowedFields = [
        'username',
        'email',
        'password',
        'role',
        'status',
        'is_deleted',
        'full_name',
        'about',
        'address',
        'profile_pic',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'facebook_url',
        'website_url',
    ];
}




