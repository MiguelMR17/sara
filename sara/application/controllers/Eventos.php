<?php

class Eventos extends MY_CI_Controller 
{

	public function autent($aula,$doc){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->abrir($aula,$doc);
	}

	public function err_huella($aula,$doc){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->err_huella($aula,$doc);
	}

	public function ayuda($aula,$doc){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->ayuda($aula,$doc);
	}

	public function puerta($aula,$val){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->puerta($aula,$val);
	}

	public function luces($aula,$val){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->luces($aula,$val);
	}

	public function equipos($aula,$val,$equ){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->luces($aula,$val,$equ);
	}

	public function tiempo($aula,$val){
		$this->load->model('Eventos_model','eventmod');
		$this->eventmod->tiempo($aula,$val);
	}
}