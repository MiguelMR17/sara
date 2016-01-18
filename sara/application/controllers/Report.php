<?php

class Report extends MY_CI_Controller 
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
		$this->load->model('Report_model','repomod');
		$this->load->view("report.phtml");	
	}

	public function generar1($aula){
		$this->load->model('Report_model','repomod');
		$result=$this->repomod->report1($aula);	
		$result["aula"]=$aula;
		print json_encode($result);	
	}


	public function generar2($aula){
		$this->load->model('Report_model','repomod');
		$result=$this->repomod->report2($aula);	
		$result["aula"]=$aula;
		print json_encode($result);	
	}

	public function generar3($mes){
		$this->load->model('Report_model','repomod');
		$result=$this->repomod->report3($mes);	
		$result["mes"]=$mes;
		$result["tipo"]="aula";
		print json_encode($result);	
	}


	public function generar4($mes){
		$this->load->model('Report_model','repomod');
		$result=$this->repomod->report4($mes);	
		$result["mes"]=$mes;
		$result["tipo"]="usuario";
		print json_encode($result);		
	}

}