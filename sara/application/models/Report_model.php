<?php

class Report_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}
//-----------------------------------------------------------------------------------------
//REPORTES
//-----------------------------------------------------------------------------------------
public function report1($aula){
	$year=date("Y");
	$data=array();
	for ($i=1; $i <= 12; $i++) { 
		$this->db->where('tipo<=',1);
		$this->db->where('aula',$aula);
		$this->db->where('month(fecha)',$i);
		$this->db->where('year(fecha)',$year);
		$data[$i]=$this->db->count_all_results('eventos');
	}
	return $data;
}

public function report2($aula){
	$year=date("Y");
	$data=array();
	for ($i=1; $i <= 12; $i++) { 
		$this->db->where('tipo<=',1);
		$this->db->where('aula',$aula);
		$this->db->where('month(fecha)',$i);
		$this->db->where('year(fecha)',$year);
		$x=$this->db->count_all_results('eventos');

		$this->db->where('tipo<=',1);
		$this->db->where('month(fecha)',$i);
		$this->db->where('year(fecha)',$year);
		$y=$this->db->count_all_results('eventos');
		if($y!=0){
			$data[$i]=(100*$x/$y);	
		}
		else{
			$data[$i]=0;
		}
		
	}
	return $data;
}

public function report3($mes){
	$data=array();
	$year=date("Y");
	for ($i=101; $i <= 118; $i++) { 
		$this->db->where('month(fecha)',$mes);
		$this->db->where('year(fecha)',$year);
		$this->db->where('aula',$i);
		$data[$i]=$this->db->count_all_results('eventos');
	}
	for ($i=201; $i <= 218; $i++) { 
		$this->db->where('month(fecha)',$mes);
		$this->db->where('year(fecha)',$year);
		$this->db->where('aula',$i);
		$data[$i]=$this->db->count_all_results('eventos');	
	}
	return $data;

}

public function report4($mes){
	$data=array();
	$year=date("Y");
	$this->db->where('month(fecha)',$mes);
	$this->db->where('year(fecha)',$year);
	$this->db->select('usuario');
	$this->db->distinct();
	$query0=$this->db->get("eventos");

	foreach ($query0->result() as $key => $value) {
		$this->db->where('month(fecha)',$mes);
		$this->db->where('year(fecha)',$year);
		$this->db->where('usuario',$value->usuario);
		$data[$value->usuario]=$this->db->count_all_results('eventos');
	}
	return $data;
}


}