<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Transaction extends ResourceController
{
	protected $modelName = 'App\Models\TrModel';
    protected $format    = 'json'; 
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index(){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        return $this->respond($this->model->findAll(), 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $data = $this->model->find($id);
        if(is_null($data)) {
			$response = [
                'status' => 'error',
                'message' => 'Transaction is invalid.',
                'errors' => $this->model->errors()
            ];
            return $this->fail($response, 404);
        }
 
        return $this->respond($data,200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create(){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
       $data = [
            'trdate' => $this->request->getPost('txttrdate'),
            'trname' => $this->request->getPost('txttdetail'),
            'trcategory' => $this->request->getPost('cmbtrcategory'),
            'tramount' => $this->request->getPost('numtramount'),
        ];
		
		try{
			$this->model->insert($data);
			return $this->respond([
				'message' => 'Saved Successfully.',
				'status' => 'success',
				'data' => $data
			],201);
		}
		catch(DatabaseException $e){
			$response = [
                'status' => 'error',
                'message' => 'Failed to save.',
                'errors' => $this->model->errors()
            ];
            return $this->fail($response , 409);
		}
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $data = [
            'trdate' => $this->request->getPost('txttrdate'),
            'trname' => $this->request->getPost('txttdetail'),
            'trcategory' => $this->request->getPost('cmbtrcategory'),
            'tramount' => $this->request->getPost('numtramount'),
        ];
        if ($this->model->where('trid', $id)->set($data)->update() === false)
        {
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response , 409);
        }
        return $this->respond(['message' => 'Updated Successfully'], 200);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null){
        $session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $this->model->delete($id);
        return $this->respond(['message' => 'Deleted Successfully'], 200);
    }
}
