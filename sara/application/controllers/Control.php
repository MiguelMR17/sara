<?php

class Control extends MY_CI_Controller 
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

		$this->load->view("salones.phtml");
	}

	public function getReservas($hora,$dia,$mes,$year){
		$this->load->model('Sara_model','saramod');
		$date=$year."-".$mes."-".$dia;
		$result=$this->saramod->getReservas($hora, $date);	
		print json_encode($result);	
	}

	public function eventosActuales(){
		$this->load->model('Sara_model','saramod');
		$result=$this->saramod->getState();	
		print json_encode($result);	
	}

	public function actualizar2(){
		$this->load->model('Sara_model','saramod');
		$result=$this->saramod->getState();	
		print json_encode($result);	
	}

	public function desreservar($aula,$hora,$dia,$mes,$year){
		$this->load->model('Sara_model','saramod');
		$date=$year."-".$mes."-".$dia;
		$this->saramod->desreservar($aula,$hora,$date);
	}


	public function inhabilitar($aula){
		$this->load->model('Sara_model','saramod');
		$this->saramod->inhabilitar($aula);
	}

	public function reservar($cc,$aula,$curso,$hora,$dia,$mes,$year){
		$this->load->model('Sara_model','saramod');
		$curso=str_replace("%20"," ",$curso);
		$nombre=$this->saramod->docente($cc);
		if($nombre==""){
			$result["ok"]=1;
		}
		else{
			$date=$year."-".$mes."-".$dia;
			$result["ok"]=$this->saramod->reservar($cc,$nombre,$aula,$curso,$hora, $date);
			$result["nombre"]=$nombre;	
		}
		print json_encode($result);
	}

	public function alertOK($aula){
		$this->load->model('Sara_model','saramod');
		$result=$this->saramod->eventoOK($aula,3);
		print json_encode($result);
	}

	public function ayudaOK($aula){
		$this->load->model('Sara_model','saramod');
		$result=$this->saramod->eventoOK($aula,5);
		print json_encode($result);
	}

	public function rehabilitar($aula){
		$this->load->model('Sara_model','saramod');
		$result=$this->saramod->eventoOK($aula,7);
		print json_encode($result);
	}

}