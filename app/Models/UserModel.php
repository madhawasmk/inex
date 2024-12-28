<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','password','isdeleted'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
	
	
	public function signin($data){
		$session = \Config\Services::session();
		$db = db_connect();
		$un = $data['txtusername'];
		$pw = $data['txtpassword'];
		
		$builder = $db->table('user');
		$builder->select('*');
		$builder->where('username',$un);
		$builder->where('password',$pw);
        $builder->where('isdeleted',0);
		
		$records = $builder->countAllResults();
		if($records == 1){
			$session = \Config\Services::session();
			$sessiondata = array(
				'username' => $data,
				'logged' => true,
			);
			$session->set($sessiondata);
			return array('status' => 1, 'message' => 'Success');
		}
		else{
        	$session->destroy();
			return array('status' => 0, 'message' => 'Invalid Username or Password');
		}
	}
	
}
