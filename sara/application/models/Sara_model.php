<?php

class Sara_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}
//-----------------------------------------------------------------------------------------
//EVENTOS MANUAL
//-----------------------------------------------------------------------------------------

	public function eventoOK($aula, $num){
		$this->db->set('estado', 'estado/'.$num, FALSE);
		$this->db->where('numero',$aula);
		$this->db->update('aulas');

		$res["salon"]=$aula;
		$this->db->where('numero',$aula);
		$query=$this->db->get('aulas');
		if($query->result()[0]->estado==1){
			$hora=date("H");
			if($hora%2!=0){
				$hora--;
			}
			$this->db->where('fecha',date("Y-m-d"));
			$this->db->where('hora',$hora);
			$this->db->where('aula',$aula);	
			$query=$this->db->get('reservas');
			$res["estado"]=sizeof($query->result());
		}
		else{
			$res["estado"]=$query->result()[0]->estado;
		}
		return $res;
	}

	public function inhabilitar($aula){
		$this->db->set('estado', 'estado*7', FALSE);
		$this->db->where('numero',$aula);
		$this->db->update('aulas');
	}

//-----------------------------------------------------------------------------------------
//LECTURA ESTADOS
//-----------------------------------------------------------------------------------------

	public function getState(){
		$this->db->where('estado!=',1);
		$query=$this->db->get('aulas');
		$i=0;
		$tbl=array();
		foreach ($query->result() as $row)
		{
        	$tbl[$i][0]=$row->numero;	
        	$tbl[$i++][1]=$row->estado;	
		}
		return $tbl;
	}

	public function getReservas($hora, $date){
		$this->db->where('fecha',$date);
		$this->db->where('hora',$hora);
		$query=$this->db->get('reservas');

		$i=0;
		$tbl=array();
		foreach ($query->result() as $row)
		{
        	$tbl[$i][0]=$row->aula;	
        	$tbl[$i][1]=$row->docente;	
        	$tbl[$i++][2]=$row->curso;	
		}
		return $tbl;
	}

//-----------------------------------------------------------------------------------------
//NOMBRES
//-----------------------------------------------------------------------------------------

	public function docente($cc){
		$nombre="";
		$this->db->where('doc',$cc);
		$this->db->where('tipo',1);
		$query=$this->db->get('usuarios');
		if(sizeof($query->result())==1){
			$nombre=$query->result()[0]->nombre." ".$query->result()[0]->apellidos;
		}
		return $nombre;
	}

//-----------------------------------------------------------------------------------------
//MANEJO RESERVAS
//-----------------------------------------------------------------------------------------

	public function reservar($cc,$nombre,$aula,$curso,$hora, $date){
		$this->db->where('fecha',$date);
		$this->db->where('hora',$hora);
		$this->db->where('aula',$aula);
		$query=$this->db->get('reservas');
		if(sizeof($query->result())!=0){
			return 2;
		}
		$this->db->where('fecha',$date);
		$this->db->where('hora',$hora);
		$this->db->where('doc',$cc);
		$query=$this->db->get('reservas');
		if(sizeof($query->result())!=0){
			return 3;
		}

		$datos=array('id'=>0,'doc'=>$cc,'hora'=>$hora,'fecha'=>$date,'docente'=>$nombre,'curso'=>$curso,'aula'=>$aula);
		$this->db->insert('reservas',$datos);
		return 0;
	}

	public function desreservar($aula,$hora,$date){
		$this->db->where('fecha',$date);
		$this->db->where('hora',$hora);
		$this->db->where('aula',$aula);
		$this->db->delete('reservas');
	}	

}