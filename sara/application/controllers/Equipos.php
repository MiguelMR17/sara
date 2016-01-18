<?php

class Equipos extends MY_CI_Controller 
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
		$this->load->model('Equip_model','equimod');
		$data['equipos']=$this->equimod->getEquipos();
		$this->load->view("equipos.phtml",$data);	
	}

	public function borrar_eq($id){
		$this->load->model('Equip_model','equimod');
		$this->equimod->borrar_eq($id);
	}

	public function registrar($est,$des,$aula,$cod){
		$this->load->model('Equip_model','equimod');
		$des=str_replace("%20"," ",$des);
		$result=$this->equimod->registrareq($est,$des,$aula,$cod);	
	}

}