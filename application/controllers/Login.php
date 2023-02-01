<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Model_login", "mLogin");
	}

	public function index(){
		if($this->session->userdata("my_sess") == "Y"){
			redirect("dashboard");
		}
		$this->load->view("login-page");
	}

	public function action(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if(isset($username) && isset($password)){
			$checkUser = $this->mLogin->checkUser($username, $password);
			if($checkUser){
				$checkStatus = $this->mLogin->checkStatus($username, $password);
				if($checkStatus){
					$dataUser = array(
					"user_id" => $checkUser->user_id,
					"username" => $checkUser->username,
					"role" => $checkUser->role,
					"email" => $checkUser->email,
					"my_sess" => "Y"
				);
				$this->session->set_userdata($dataUser);
				redirect("dashboard");
				} else {
					$this->session->set_flashdata("error", "Maaf, akun anda dinonaktifkan. Silahkan hubungi admin");
					redirect("");
				}
			} else {
				$this->session->set_flashdata("error", "Login gagal! Periksa akun anda");
				redirect("");
			}
		}
	}

	public function doLogout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
