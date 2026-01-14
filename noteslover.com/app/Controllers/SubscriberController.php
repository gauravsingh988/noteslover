<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubscriberModel;

class SubscriberController extends BaseController
{
    protected $subscriberModel;

    public function __construct()
    {
        $this->subscriberModel = new SubscriberModel();
    }

    public function store()
    {
        $email = $this->request->getPost('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format.');
        }

        if ($this->subscriberModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'You are already subscribed.');
        }

        $this->subscriberModel->insert([
            'email' => $email,
            'status' => 'active'
        ]);

        return redirect()->back()->with('success', 'Successfully subscribed!');
    }

    public function index()
    {
        $data['subscribers'] = $this->subscriberModel->orderBy('id', 'DESC')->findAll();
        return view('admin/subscribers/index', $data);
    }

    public function toggleStatus($id)
    {
        $subscriber = $this->subscriberModel->find($id);

        if (!$subscriber) {
            return redirect()->back()->with('error', 'Subscriber not found.');
        }

        $newStatus = $subscriber['status'] === 'active' ? 'inactive' : 'active';

        $this->subscriberModel->update($id, ['status' => $newStatus]);

        return redirect()->back()->with('success', 'Status updated.');
    }

    public function delete($id)
    {
        $this->subscriberModel->delete($id);
        return redirect()->back()->with('success', 'Subscriber deleted.');
    }
}
