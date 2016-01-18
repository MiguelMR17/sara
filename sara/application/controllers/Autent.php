<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Autent extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->model('Autent_model','autemod');
		if ($this->autemod->logged_in())
		{
			redirect("control", 'refresh');
		}
		else
		{
			$this->load->view("logeo.phtml",array("mensaje"=>""));	
		}
	}


	function login($usuario,$clave)
	{
		$this->load->model('Autent_model','autemod');
		$data['mensaje']=$this->autemod->login($usuario,$clave);		
		print json_encode($data);			
	}

	function logout()
	{
		$this->load->model('Autent_model','autemod');
		$this->autemod->logout();
		redirect("autent", 'refresh');
	}

}