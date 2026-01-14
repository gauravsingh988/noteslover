<?php

namespace App\Controllers;
use App\Models\UserModel;

class MentorController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
    
        // Get mentor data as an array
        $mentors = $userModel
            ->where('is_deleted', 0)
            ->findAll();
    
        // Optional: If you want to check if no data found
        if (empty($mentors)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mentor not found.");
        }
    
        $data['mentors'] = $mentors;
        return view('mentor/index', $data);
    }
    
    public function view_mentor_profile($username)
    {
        $userModel = new UserModel();

        $mentor = $userModel
            ->where('username', $username)
            // ->where('role', 'mentor') // optional, if you want only mentors
            ->where('is_deleted', 0)
            ->first();

        if (!$mentor) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mentor not found.");
        }

        $data['mentor'] = $mentor;

        return view('mentor/profile', $data);
    }
}
?>