<?php

namespace App\Models;

use CodeIgniter\Model;

class CRUD_model extends Model
{
    protected $db;
    protected $builder;
    public function __construct($table)
    {
        $this->db = \Config\Database::connect();
        $this->builder  = $this->db->table($table);
    }

    function getAll()
    {
        return $this->builder->where("deleted_at", null)->get();
    }

    function getAllLimit($limit)
    {
        $this->builder->where("deleted_at", null);
        $this->builder->limit(1);
        return $this->builder->get();
    }

    function getSelect($select)
    {
        $this->builder->select($select);
        $this->builder->where("deleted_at", null);
        return $this->builder->get();
    }

    function getWhere($select, $where = [])
    {
        $this->builder->select($select);
        $this->builder->where("deleted_at", null);
        $this->builder->where($where);
        return $this->builder->get();
    }

    function getById($select, $id_table, $id)
    {
        $this->builder->select($select);
        $this->builder->where("deleted_at", null);
        $this->builder->where($id_table, $id);
        $this->builder->limit(1);
        return $this->builder->get();
    }

    function insertData($data)
    {
        $additionalData["created_at"] = date("Y-m-d H:i:s");
        $data = $data + $additionalData;

        $this->builder->insert($data);

        return  $this->db->insertID();
    }

    function updateData($table, $id_table, $id, $data)
    {
        $additionalData["updated_at"] = date("Y-m-d H:i:s");
        $data = $data + $additionalData;

        $this->builder->where($id_table, $id);
        $this->builder->update($table, $data);

        return $id;
    }

    function getConfig($configName)
    {
        return $this->builder->where("name", $configName)->get()
            ->getRow();
    }

    function deleteData($id_table, $id, $type = 0)
    {
        if ($type == 0) {
            $data = [
                "deleted_at" => date("Y-m-d H:i:s")
            ];

            $this->builder->where($id_table, $id);
            $this->builder->update($data);
        } else {
            $this->builder->where($id_table, $id);
            $this->builder->delete();
        }
        return true;
    }

    function getMenu($parent = 0)
    {
        $session_app = $this->session->userdata(SESSIONCODE);
        $session_id = ($session_app['role_id'] != "") ? $session_app['role_id'] : "0";

        $query = $this->builder->select("a.id, icon, name, url")
            ->from("management_system.web_menu a")
            ->join("management_system.web_menu_role b", "a.id = b.menu_id AND b.role_id = " . $session_id)
            ->where("a.parent", $parent)
            ->where("a.state", 1)
            ->orderBy("a.sort", "ASC");
        return ($parent == 0) ? $query->get()->getResultArray() : $query;
    }

}

/* End of file CRUD_model.php */
/* Location: ./application/models/CRUD_model.php */
