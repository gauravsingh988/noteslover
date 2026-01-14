<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\BannerModel;
use App\Models\ContactModel;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\RequestedNotesModel;

class HomeController extends BaseController
{
    public function index()
    {
        helper('text');
        $noteModel = new NoteModel();
        $bannerModel = new BannerModel();
        $successStoryModel = new PostModel();

        // Recent Notes (Latest 7)
        $data['recent_notes'] = $noteModel->getNotesWithRatings([], 4, 'notes.id DESC');

        // Banners
        $data['banners'] = $bannerModel
            ->where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(7)
            ->find();

        // Stories
        $data['success_stories'] = $successStoryModel
            ->where('status', 'active')
            ->where('type', 'story')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->find();

        // Blogs
        $data['blogs'] = $successStoryModel
            ->where('status', 'active')
            ->where('type', 'blog')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->find();
            
        // Model Paper
        $data['model_papers'] = $successStoryModel
            ->where('status', 'active')
            ->where('type', 'model_paper')
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->find();

        // Categories
        $model = new CategoryModel();
        $data['home_categories'] = $model->where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->find();
        return $this->render('index', $data);
    }

    public function privacy_policy()
    {
        return $this->render('privacy_policy');
    }

    public function terms_and_conditions()
    {
        return $this->render('terms_and_conditions');
    }

    public function about()
    {
        return $this->render('about');
    }

    public function faqs()
    {
        return $this->render('faqs');
    }
    
    public function contact()
    {
        helper(['form']);
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name'    => 'required|min_length[3]|max_length[100]',
                'email'   => 'required|valid_email',
                'message' => 'required|min_length[10]'
            ];

            $messages = [
                'name' => [
                    'required'    => 'Name is required.',
                    'min_length'  => 'Name must be at least 3 characters long.',
                ],
                'email' => [
                    'required'     => 'Email is required.',
                    'valid_email'  => 'Please enter a valid email address.',
                ],
                'message' => [
                    'required'    => 'Message is required.',
                    'min_length'  => 'Message must be at least 10 characters long.',
                ]
            ];

            if (!$this->validate($rules, $messages)) {
                return $this->render('contact', [
                    'validation' => $this->validator
                ]);
            }

            // Save using the model
            $contactModel = new ContactModel();

            $contactModel->insert([
                'name'       => $this->request->getPost('name'),
                'email'      => $this->request->getPost('email'),
                'message'    => $this->request->getPost('message'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return $this->render('contact', [
                'success' => 'Thank you! Your message has been sent successfully.'
            ]);
        }

        return $this->render('contact');
    }
    
    public function requestNotes()
    {
        $model = new RequestedNotesModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'notes_request' => $this->request->getPost('notes_request'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        


        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }


}

