<?php

class Autent_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

//-----------------------------------------------------------------------------------------
//AUTENTIFICACION
//-----------------------------------------------------------------------------------------

public function login($usuario, $clave)
	{
		
		if (empty($usuario) || empty($clave))
		{
			$this->session->loged=FALSE;
			return "Algún campo sigue vacio.";
		}

		$this->db->where('usuario',$usuario);
		$this->db->where('clave',sha1($clave));
		$query = $this->db->get('admins');

		if(sizeof($query->result())>0){
			$this->session->loged=TRUE;
			return "OK";
		}
		$this->session->loged=FALSE;
		return "Usuario o contraseña incorrectos.";
	}

public function logged_in(){
	return $this->session->loged;
}

public function logout(){
	$this->session->loged=FALSE;
}


}