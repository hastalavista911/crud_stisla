<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        $loginstatus = $this->session->userdata('role');
        if($loginstatus!=1){
            redirect('my404');
        }
        $this->load->model("Model_user");
    }

    public function index() {
    	$data['user'] = $this->Model_user->getUser();
    	$this->template->load("template", "user/data-user", $data);
    }

    public function get_data_user($idUser = null){
        $data = $this->Model_user->getUser($idUser);
        echo json_encode(array("status" => "success", "data" => $data));
    }

    public function addUser(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $status = $this->input->post('status');

        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => md5($password),
            'role' => $role,
            'status' => $status,
            'deleted' => 0
        );
        
        $checkUsername = $this->Model_user->check_existing_user("username", $username);
        if($checkUsername){
            echo json_encode(array("status" => "error", "message" => "Usernane already exists, please use another Username."));
        } else {
            $query = $this->Model_user->add_user($data);
            if($query){
                echo json_encode(array("status" => "success", "message" => "Successfully add new user", "data" => $data));
            } else {
                echo json_encode(array("status" => "error", "message" => "Failed, user can't be saved.!!"));
            }
        }
    }

    public function editUser(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $status = $this->input->post('status');

        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'status' => $status,
            'deleted' => 0
        );

        if($password != ""){
            $data["password"] = md5($password);
        }

        $query = $this->Model_user->update_user($data, $user_id);
        if($query){
            echo json_encode(array("status" => "success", "message" => "User successfully changed", "data" => $data));
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed, user can't be changed.!!"));
        }
    }

    public function delete_data_user(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id_user = $this->input->post("id_user");
        $file_user = $this->db->get_where('tbl_user', ['id_user' => $id_user])->row();
        $delete = $this->Model_user->deleteUser($id_user);
        if($delete){
            unlink("file/ttd-user/".$file_user->file_ttd);
            echo json_encode(array("status" => "success", "data" => $id_user, "message" => "Successfully delete user"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed, user can't be deleted.!!"));
        }
    }

    public function soft_delete_user(){
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $user_id = $this->input->post("user_id");
        $data = array('deleted' => 1, 'status' => 0);
        $query = $this->Model_user->update_user($data, $user_id);
        if($query){
            echo json_encode(array("status" => "success", "message" => "Data user berhasil dihapus", "data" => $data));
        } else {
            echo json_encode(array("status" => "error", "message" => "Gagal, tidak bisa menghapus data.!!"));
        }
    }
}