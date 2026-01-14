<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ErrorsController extends BaseController
{
    public function show404()
    {
        return $this->render('errors/html/error_404');
    }
}
