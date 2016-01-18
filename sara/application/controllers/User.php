<?php

class User extends MY_CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Autent_model','autemod');
		if (!$this->autemod->logged_in())
		{
			redirect("autent", 'refresh');
		}
	}

	public function index(){
		$this->load->model('User_model','usermod');
		$data['users']=$this->usermod->getUsuarios();
		$this->load->view("users.phtml",$data);	
	}

	public function borrar_user($id){
		$this->load->model('User_model','usermod');
		$this->usermod->borrar_user($id);
	}

	public function registrar($nom,$ape,$doc,$tipo){
		$this->load->model('User_model','usermod');
		$nom=str_replace("%20"," ",$nom);
		$ape=str_replace("%20"," ",$ape);
		$result=$this->usermod->registrar($nom,$ape,$doc,$tipo);	
	}

}