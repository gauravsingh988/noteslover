<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('profile');
    }

    public function change_password()
    {
        return view('change_password');
    }
}
