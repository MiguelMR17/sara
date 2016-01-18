<?php

class Equip_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}
//-----------------------------------------------------------------------------------------
//EQUIPOS
//-----------------------------------------------------------------------------------------

	public function getEquipos(){
		$query=$this->db->get('equipos');
		$i=0;
		$tbl=array();
		//$tipos=array("Administrador","Docente","Monitor");
		foreach ($query->result() as $row)
		{
        	$tbl[$i][0]=$row->codigo;
        	$tbl[$i][1]=$row->descrip;	
        	$tbl[$i][2]=$row->estado;
        	$tbl[$i][3]=$row->aula;
        	$tbl[$i++][4]=$row->id;	
		}
		return $tbl;
	}

	public function borrar_eq($id){
		$this->db->where('id',$id);
		$query=$this->db->get('equipos');

		$this->db->where('id',$id);
		$this->db->delete('equipos');

		$this->db->set('equipos', 'equipos-1', FALSE);
		$this->db->where('numero',$query->result()[0]->aula);
		$this->db->update('aulas');
	}

	public function registrareq($est,$des,$aula,$cod){
		$datos=array('id'=>0,'estado'=>$est,'descrip'=>$des,'aula'=>$aula,'codigo'=>$cod);
		$this->db->insert('equipos',$datos);
		$this->db->set('equipos', 'equipos+1', FALSE);
		$this->db->where('numero',$aula);
		$this->db->update('aulas');
	}




}