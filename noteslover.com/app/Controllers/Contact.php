<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class Contact extends BaseController
{
    public function index()
    {
        helper(['form']);

        // Load view with default data
        return $this->render('contact', [
            'validation' => null,
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function save()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required|min_length[3]|max_length[150]',
            'email' => 'required|valid_email|max_length[150]',
            'message' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return view('contact', [
                'validation' => $this->validator,
            ]);
        } else {
            $contactModel = new ContactModel();

            $data = [
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'message' => $this->request->getPost('message'),
            ];

            if ($contactModel->insert($data)) {
                session()->setFlashdata('success', 'Thank you! Your message has been sent successfully.');
            } else {
                session()->setFlashdata('error', 'Something went wrong. Please try again.');
            }

            return redirect()->to(base_url('contact'));
        }
    }
}
