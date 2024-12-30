<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    public function analyse_income(){
		$db = db_connect();
		$builder = $db->table("transaction");
		$builder->select("*");
		$builder->join("category","transaction.trcategory = category.catid");
		$builder->where("transaction.deleted_at",null);
		$builder->where("category.cattype",1);
		$builder->orderBy("transaction.trdate","ASC");
		$records = $builder->get();
		$result = $records->getResult('array');
		return $result;
	}
	
	public function analyse_expense(){
		$db = db_connect();
		$builder = $db->table("transaction");
		$builder->select("*");
		$builder->join("category","transaction.trcategory = category.catid");
		$builder->where("transaction.deleted_at",null);
		$builder->where("category.cattype",2);
		$builder->orderBy("transaction.trdate","ASC");
		$records = $builder->get();
		$result = $records->getResult('array');
		return $result;
	}
}
