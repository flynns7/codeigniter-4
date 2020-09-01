<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{   
    protected $db;
    protected $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder  = $this->db->table("management_system.user u");
    }
	public function getUser($id){
		$query = $this->builder->select("u.id, u.name, u.email, u.password, u.image, role_id, LOWER(r.name) as role_as, u.state, u.company_id as company_id, c.name as company_name")
            ->join("management_system.web_role r", "u.role_id = r.id","left")
            ->join("wallet.company c", "u.company_id = c.company_id","left")
			->where("u.id", $id)
			->where("u.state", 1)
			->where("u.deleted_at", null)
            ->limit(1)
            ->get();
        return ($query->getFieldCount() == 1) ? $query->getRowArray() : false;
	}
    
	public function checkUser($username){
		$query = $this->builder->select("id,password")
          ->where("email", $username);
        return ($query->countAllResults() == 1) ? $query->get()->getRowObject() : null ;
	}
}