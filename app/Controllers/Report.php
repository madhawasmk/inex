<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Report extends ResourceController
{
	protected $modelName = 'App\Models\ReportModel';
    protected $format    = 'json'; 
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
	
	public function income(){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		
		$data = $this->model->analyse_income();
		if(count($data) > 0){
			return $this->respond($data, 200);
		}
		else{
			$response = [
                'status' => 'error',
                'message' => 'No income records.',
                'errors' => $this->model->errors()
            ];
            return $this->fail($response, 404);
		}
        
    }
	
	public function expense(){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		
		$data = $this->model->analyse_expense();
		if(count($data) > 0){
			return $this->respond($data, 200);
		}
		else{
			$response = [
                'status' => 'error',
                'message' => 'No expense records.',
                'errors' => $this->model->errors()
            ];
            return $this->fail($response, 404);
		}
        
    }

}
