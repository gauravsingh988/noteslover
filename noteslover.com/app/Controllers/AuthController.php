<?php
// app/Controllers/Auth.php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegisterModel;

class AuthController extends BaseController
{
    public function login()
    {
        return $this->render('auth/login');
    }

   public function register()
    {
        return $this->render('auth/register');
    }

  
   public function loginCheck()
{
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    if (!$email || !$password) {
        return redirect()->back()->with('error', 'Email and Password are required');
    }

    $userModel = new RegisterModel();
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not registered');
    }

    if (!password_verify($password, $user['password'])) {
        return redirect()->back()->with('error', 'Invalid password');
    }

    session()->set([
        'user_id'    => $user['id'],
        'user_name'  => $user['name'],
        'user_email' => $user['email'],
        'logged_in'  => true
    ]);

    return redirect()->to('/dashboard')->with('success', 'Login successful');
}




public function registerSave()
{
    $name     = $this->request->getPost('name');
    $email    = $this->request->getPost('email');
    $phone    = $this->request->getPost('phone');
    $password = $this->request->getPost('password');
    $confirm  = $this->request->getPost('confirm_password');

    if ($password !== $confirm) {
        return redirect()->back()->with('error', 'Passwords do not match');
    }

    $registerModel = new RegisterModel();

    if ($registerModel->where('email', $email)->first()) {
        return redirect()->back()->with('error', 'Email already exists');
    }

    $registerModel->insert([
        'name'     => $name,
        'email'    => $email,
        'phone'    => $phone,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    return redirect()->to('/login')
        ->with('success', 'Registration successful. Please login.');
}



    public function sendOtp()
    {
        $session = session();
        $phone = $this->request->getPost('phone');

        $model = new UserModel();
        $user = $model->where('phone', $phone)
                    ->where('is_deleted', 0)
                    ->first();

        if (!$user) {
            return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
        }

        if ($user['status'] !== 'active') {
            return $this->response->setJSON(['success' => false, 'message' => 'Account is inactive']);
        }

        $otp = rand(100000, 999999);
        $session->set('login_otp', $otp);
        $session->set('login_phone', $phone);
        $session->set('otp_time', time());

        // TODO: Send OTP via SMS service here

        return $this->response->setJSON(['login_otp' => $otp, 'success' => true, 'phone' => $phone, 'message' => 'OTP sent successfully']);
    }

    public function verifyOtp()
    {
        $session = session();
        $otp = $this->request->getPost('otp');
        $redirectUrl = $this->request->getPost('redirect_url') ?? base_url('/dashboard');

        // ✅ FIX: Use correct session keys
        $storedOtp = $session->get('login_otp');
        $phone = $session->get('login_phone');

        if (!$storedOtp || !$phone) {
            return $this->response->setJSON(['success' => false, 'message' => 'Session expired. Try again.']);
        }

        if ($otp != $storedOtp) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid OTP.']);
        }

        $user = (new \App\Models\UserModel())->where('phone', $phone)->first();

        if (!$user) {
            return $this->response->setJSON(['success' => false, 'message' => 'User not found.']);
        }

        // Set user session
        $session->set('user', [
            'id'         => $user['id'],
            'phone'      => $user['phone'],
            'full_name'  => $user['full_name'],
            'isLoggedIn' => true,
        ]);

        // Clear OTP from session
        $session->remove('otp');
        $session->remove('phone');

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Login successful!',
            'redirect_url' => $redirectUrl
        ]);
    }


    public function profile()
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user')['id']);

        return view('auth/profile', ['user' => $user]);
    }

    public function edit()
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('user')['id']);
        return view('auth/edit', ['user' => $user]);
    }

    public function update()
    {
        helper(['form', 'url']);

        $userId = session()->get('user')['id']; // Make sure this session key exists

        if ($this->request->getMethod() !== 'post') {
            return redirect()->back()->with('error', 'Invalid request method.');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'email'          => 'required|valid_email',
            'full_name'      => 'permit_empty|string|max_length[100]',
            'about'          => 'permit_empty|string',
            'address'        => 'permit_empty|string',
            'linkedin_url'   => 'permit_empty|valid_url',
            'twitter_url'    => 'permit_empty|valid_url',
            'instagram_url'  => 'permit_empty|valid_url',
            'youtube_url'    => 'permit_empty|valid_url',
            'facebook_url'   => 'permit_empty|valid_url',
            'website_url'    => 'permit_empty|valid_url',
            'profile_pic'    => 'permit_empty|is_image[profile_pic]|max_size[profile_pic,2048]',
            'govt_result_file' => 'permit_empty|max_size[govt_result_file,2048]|ext_in[govt_result_file,pdf,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $validation->listErrors());
        }

        $userModel = new \App\Models\UserModel();

        $data = [
            'email'          => $this->request->getPost('email'),
            'full_name'      => $this->request->getPost('full_name'),
            'about'          => $this->request->getPost('about'),
            'address'        => $this->request->getPost('address'),
            'linkedin_url'   => $this->request->getPost('linkedin_url'),
            'twitter_url'    => $this->request->getPost('twitter_url'),
            'instagram_url'  => $this->request->getPost('instagram_url'),
            'youtube_url'    => $this->request->getPost('youtube_url'),
            'facebook_url'   => $this->request->getPost('facebook_url'),
            'website_url'    => $this->request->getPost('website_url'),
            'occupation'     => $this->request->getPost('occupation'),
            'govt_roll_no'   => $this->request->getPost('govt_roll_no'),
            'department'     => $this->request->getPost('department'),
            'designation'    => $this->request->getPost('designation'),
        ];

        // ✅ Upload profile pic
        $profilePic = $this->request->getFile('profile_pic');
        if ($profilePic && $profilePic->isValid() && !$profilePic->hasMoved()) {
            $newName = $profilePic->getRandomName();
            $profilePic->move(ROOTPATH . 'assets/uploads/profile_pics/', $newName);
            $data['profile_pic'] = base_url('assets/uploads/profile_pics/' . $newName);
        }

        // ✅ Upload Govt Result file
        $govtFile = $this->request->getFile('govt_result_file');
        if ($govtFile && $govtFile->isValid() && !$govtFile->hasMoved()) {
            $newName = $govtFile->getRandomName();
            $govtFile->move(ROOTPATH . 'assets/uploads/govt_results/', $newName);
            $data['govt_result_file'] = base_url('assets/uploads/govt_results/' . $newName);
        }

        // ✅ Save to DB
        $updated = $userModel->update($userId, $data);

        if ($updated) {
            return redirect()->to('/auth/profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }



    public function change_password()
    {
        return view('auth/change_password');
    }

    public function update_password()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $validation->getErrors()));
        }

        $userId = session()->get('user')['id']; // Adjust if needed
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        if (!password_verify($this->request->getPost('old_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Old password is incorrect.');
        }

        $userModel->update($userId, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    
   
}