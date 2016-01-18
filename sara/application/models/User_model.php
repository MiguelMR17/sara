<?php

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}
//-----------------------------------------------------------------------------------------
//USUARIOS
//-----------------------------------------------------------------------------------------

	public function getUsuarios(){
		$query=$this->db->get('usuarios');
		$i=0;
		$tbl=array();
		$tipos=array("Administrador","Docente","Monitor");
		foreach ($query->result() as $row)
		{
        	$tbl[$i][0]=$row->nombre;
        	$tbl[$i][1]=$row->apellidos;	
        	$tbl[$i][2]=$row->doc;
        	$tbl[$i][3]=$tipos[$row->tipo];
        	$tbl[$i++][4]=$row->id;	
		}
		return $tbl;
	}

	public function borrar_user($id){
		$this->db->where('id',$id);
		$this->db->delete('usuarios');
	}

	public function registrar($nom,$ape,$doc,$tipo){
		$datos=array('id'=>0,'doc'=>$doc,'tipo'=>$tipo,'apellidos'=>$ape,'nombre'=>$nom);
		$this->db->insert('usuarios',$datos);
	}



}