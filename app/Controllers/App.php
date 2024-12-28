<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CatModel;

class App extends BaseController
{
    public function index()
    {
		$session = \Config\Services::session();
		$session->destroy();
        return view('login');
    }
	
	public function home()
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }

		return view('home');
    }
}
