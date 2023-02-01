<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
	public function getUser($id = null){
        if(isset($id)){
            $this->db->where("user_id", $id);
        }
        $this->db->select("*");
		$this->db->from("user");
        $this->db->where("deleted", 0);
		$this->db->order_by("user_id", "desc");
        $data = $this->db->get();
            if($data->num_rows() > 0){
                return $data->result();
            } else {
                return array();
            }
    }

    public function add_user($data){
        $this->db->insert("user", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update_user($data, $user_id){
        $this->db->where("user_id", $user_id)->update("user", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($idUser){
        $this->db->where("id_user", $idUser)->delete("tbl_user");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function soft_delete($id_user){
        $this->db->set("is_delete", 1);
        $this->db->where("id_user", $id_user);
        $this->db->update("tbl_user");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function check_existing_user($column, $value){
            $this->db->select("user_id");
            $this->db->from("user");
            $this->db->where($column, $value);
            $data = $this->db->get();
            if($data->num_rows() > 0){
                return $data->result();
            } else {
                return false;
            }
    }

    public function changePwd($password, $id){
        $this->db->set("password", $password);
        $this->db->where("id_user", $id);
        $this->db->update("tbl_user");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}