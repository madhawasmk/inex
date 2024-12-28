<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class User extends ResourceController
{
	protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json'; 
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index(){
		$data = $this->model->findall();
        if(is_null($data)) {
            return $this->fail(['error' => 'Lab does not exist'], 404);
        }
 
        return $this->respond($data,200);
    }
	
	public function login(){
		$data = $this->request->getPost();
		$response = $this->model->signin($data);
		return $this->respond($response,200);
	}

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($username = null){
        $data = $this->model->find($username);
        if(is_null($data)) {
            return $this->fail(['error' => 'Lab does not exist'], 404);
        }
 
        return $this->respond($data,200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create(){

       $data = [
            'labname' => $this->request->getPost('txtlabname'),
            'description' => $this->request->getPost('txtdescription'),
			'location' => $this->request->getPost('txtlocation'),
        ];
		
		try{
			$this->model->insert($data);
			return $this->respond([
				'message' => 'Created Successfully',
				'status' => 'success',
				'data' => $data
			],201);
		}
		catch(DatabaseException $e){
			$response = [
                'status' => 'error',
                'message' => 'Invalid inputs or database error.',
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
        $data = [
            'labname' => $this->request->getPost('labname'),
            'description' => $this->request->getPost('description'),
			'location' => $this->request->getPost('location'),
            'updated_at' => date("Y-m-d h:i:s"),
        ];
  
        if ($this->model->where('id', $id)->set($data)->update() === false)
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
        $data = [
            'isdeleted' => 1,
            'deleted_at' => date("Y-m-d h:i:s"),
        ];
  
        if ($this->model->where('id', $id)->set($data)->update() === false)
        {
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response , 409);
        }
  
        return $this->respond(['message' => 'Deleted Successfully'], 200);
    }
}
