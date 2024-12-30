<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TrModel;
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
	
	public function addcat()
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }

		return view('addcat');
    }
	
	public function editcat()
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$this->catmodel = new CatModel();
		$data['cats'] = $this->catmodel->getAllCats();
		return view('editcat',$data);
    }

    public function addtr()
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }

        $this->catmodel = new CatModel();
		$data['cats'] = $this->catmodel->getAllCats();
		return view('addtr',$data);
    }
	
	public function edittr()
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$this->trmodel = new TrModel();
        $this->catmodel = new CatModel();
		$data['trs'] = $this->trmodel->getAllTrs();
		$data['cats'] = $this->catmodel->getAllCats();
		return view('edittr',$data);
    }

	public function income_analyse()
	{
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		
		return view("income");
	}

	public function expense_analyse()
	{
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		
		return view("expense");
	}
}
