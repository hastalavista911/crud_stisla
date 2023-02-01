<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
		parent::__construct();
		checkSessionUser();
        $this->load->model("Model_user");
    }

    public function index() {
        $user = $this->Model_user->getUser();
        $active_users = count($user);

        $data = [
            'active_users' => $active_users,
        ];
        $this->template->load("template", "dashboard/v_dashboard", $data);
    }
}