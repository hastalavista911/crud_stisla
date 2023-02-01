<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function checkUser($username, $password){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where(array(
            "username" => $username,
            "password" => md5($password)
        ));

        $user = $this->db->get();
        if($user->num_rows() > 0){
            return $user->row();
        } else {
            return false;
        }
    }
    public function checkStatus($username, $password){
        $this->db->select("user_id, username, status");
        $this->db->from("user");
        $this->db->where(array(
            "username" => $username,
            "password" => md5($password),
            "status" => 1
            ));
        $user = $this->db->get();
        if($user->num_rows() > 0){
            return $user->row();
        } else {
            return false;
        }
        }
    }