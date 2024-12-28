<?php

namespace App\Models;

use CodeIgniter\Model;

class CatModel extends Model
{
    protected $table            = 'category';
    protected $primaryKey       = 'catid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['catname','cattype','catdesc'];

    protected bool $allowEmptyInserts = true;
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
	
	public function getAllCats(){
		$db = db_connect();
		$builder = $db->table('category');
		$builder->select('*');
		$records = $builder->get();
        $result = $records->getResult('array');
        $cats = [
			" " => " -- Select One -- ",
		];
        foreach($result as $cat){
            if($cat['deleted_at'] == null){
                $cats[$cat['catid']] = $cat['catid']." - ".$cat['catname'];
            }
            
		}
		return $cats;
	}
}
