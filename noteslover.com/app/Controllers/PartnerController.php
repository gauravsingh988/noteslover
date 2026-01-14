<?php
namespace App\Controllers;

use App\Models\PartnerModel;

class PartnerController extends BaseController
{
    public function index()
    {
        return $this->render('partner/index');
    }
    
    public function submit()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'name'           => 'required',
            'email'          => 'required|valid_email',
            'phone'          => 'required|regex_match[/^\+?[0-9]{10,15}$/]',
            'notes_category' => 'required'
        ]);

        // Validation failed
        if (!$validation->withRequest($this->request)->run()) {
            return $this->render('partner/index', [
                'validation' => $validation
            ]);
        }

        // Save Data
        $model = new PartnerModel();
        $data = [
            'name'           => $this->request->getPost('name'),
            'email'          => $this->request->getPost('email'),
            'phone'          => $this->request->getPost('phone'),
            'notes_category' => $this->request->getPost('notes_category'),
            'message'        => $this->request->getPost('message'),
        ];

        $model->save($data);

        // Flash message
        session()->setFlashdata('success', 'Submitted Successfully! Our team will contact you soon.');

        return redirect()->back();
    }
}
?>
