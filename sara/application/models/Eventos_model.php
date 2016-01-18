<?php
require('Pusher.php');

class Eventos_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}


//-----------------------------------------------------------------------------------------
//EVENTOS AUTO
//-----------------------------------------------------------------------------------------

	public function abrir($aula,$doc){
		$this->db->where('doc',$doc);
		$this->db->where('tipo!=',1);
		$query=$this->db->get('usuarios');
		if(sizeof($query->result())==1){	
			$this->evento(0,$aula,$doc);
			echo "OK";
		}
		else{
			$hora=date("H");
			if($hora%2!=0){
				$hora--;
			}
			$this->db->where('fecha',date("Y-m-d"));
			$this->db->where('hora',$hora);
			$this->db->where('aula',$aula);
			$this->db->where('doc',$doc);
			$query=$this->db->get('reservas');
			if($query->result()!=array()){
				$this->evento(1,$aula,$doc);
				echo "OK";
			}
			else{
				$this->alerta($aula);
				$this->evento(2,$aula,$doc);
				echo "XX";
			}
		}		
	}

	private function alerta($aula){
		$pusher = new Pusher("7bb943dc969576596a62", "727715fd403304d59fc9", "160363");
		$pusher->trigger('eventos', 'alerta', array('salon' => $aula));
		$this->db->set('estado', 'estado*3', FALSE);
		$this->db->where('numero',$aula);
		$this->db->update('aulas');
	}

	public function err_huella($aula,$doc){
		$this->evento(3,$aula,$doc);
		$this->alerta($aula);
	}

	public function ayuda($aula,$doc){
		$pusher = new Pusher("7bb943dc969576596a62", "727715fd403304d59fc9", "160363");
		$pusher->trigger('eventos', 'ayuda', array('salon' => $aula));
		$this->evento(4,$aula,$doc);
		$this->db->set('estado', 'estado*5', FALSE);
		$this->db->where('numero',$aula);
		$this->db->update('aulas');
	}


	private function evento($tipo,$aula,$doc){
		$datos=array('id'=>0,'usuario'=>$doc,'tipo'=>$tipo,'fecha'=>date("Y-m-d"),'hora'=>date("H:i:s"),'aula'=>$aula);
		$this->db->insert('eventos',$datos);
	}

	public function puerta($aula,$val){
		if($val==0){
			$this->alerta($aula);
			$this->evento(5,$aula,0);
		}
		else if($val==1){
			$pusher = new Pusher("7bb943dc969576596a62", "727715fd403304d59fc9", "160363");
			$pusher->trigger('eventos', 'ocupar', array('salon' => $aula));
			$this->db->set('estado', 'estado*2', FALSE);
			$this->db->where('numero',$aula);
			$this->db->update('aulas');
		}
		else if($val==2){
			$this->db->set('estado', 'estado/2', FALSE);
			$this->db->where('numero',$aula);
			$this->db->update('aulas');
			$pusher = new Pusher("7bb943dc969576596a62", "727715fd403304d59fc9", "160363");
			$pusher->trigger('eventos', 'cerrar', array('salon' => $aula));
			$this->evento(6,$aula,0);
		}
	}

	public function luces($aula,$val){
		if($val==0){
			$this->alerta($aula);
			$this->evento(7,$aula,0);
		}
		else if($val==1){
			$this->evento(8,$aula,0);
		}
		else if($val==2){
			$this->evento(9,$aula,0);		}
	}

	public function equipos($aula,$val,$equ){
		if($val==0){
			$this->alerta($aula);
			$this->evento(10,$aula,0);
		}
		else if($val==1){
			$this->evento(11,$aula,0);
		}
		else if($val==2){
			$this->evento(12,$aula,0);	
		}
	}

	public function tiempo($aula,$val){
		if($val==0){
			$this->alerta($aula);
			$this->evento(13,$aula,0);
		}
		else if($val==1){
			$this->db->where_in('hora',array(date("H"),date("H")-1));
			$this->db->where('fecha',date("Y-m-d"));
			$this->db->delete('reservas');
			$pusher = new Pusher("7bb943dc969576596a62", "727715fd403304d59fc9", "160363");
			$pusher->trigger('eventos', 'liberar', array('salon' => $aula));
			$this->evento(14,$aula,0);
		}
	}

}