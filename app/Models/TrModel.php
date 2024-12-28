<?php

namespace App\Models;

use CodeIgniter\Model;

class TrModel extends Model
{
    protected $table            = 'transaction';
    protected $primaryKey       = 'trid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['trdate','trname','trcategory','tramount'];

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

    public function getAllTrs(){
		$db = db_connect();
		$builder = $db->table('transaction');
		$builder->select('*');
		$records = $builder->get();
        $result = $records->getResult('array');
        $trs = [
			" " => " -- Select One -- ",
		];
        foreach($result as $tr){
            if($tr['deleted_at'] == null){
                $trs[$tr['trid']] = $tr['trid']." - ".$tr['trname']."(".$tr['trdate'].")";
            }
            
		}
		return $trs; 
	}
}
