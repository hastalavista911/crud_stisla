<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My404 extends CI_Controller{
	public function __construct(){
    	parent::__construct();
    	checkSessionUser();
	} 

 	public function index(){ 
    	// $this->output->set_status_header('404');
    	$this->load->view("errors/404");
    	// $this->template->load("template", "errors/404");//loading in custom error view

	} 
} 