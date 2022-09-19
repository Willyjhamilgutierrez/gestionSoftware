<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {

	public function listaestudiantes()
	{
		$this->db->select('*');
		$this->db->from('estudiante');
		$this->db->where('estado',1);
		// $this->db->where('nota<=',61); CONSULTA PARA CONDICIONALES
		return $this->db->get(); //debolución del resultado de la consulta
	}

	public function agregarestudiante($data)
	{
		$this->db->insert('estudiante',$data);
	}

	public function eliminarestudiante($idEstudiante)
	{
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->delete('estudiante');
	}

	public function recuperarestudiante($idEstudiante)
	{
		$this->db->select('*');
		$this->db->from('estudiante');
		$this->db->where('idEstudiante',$idEstudiante);
		return $this->db->get(); //debolución del resultado de la consulta
	}

	public function modificarestudiante($idEstudiante,$data)
	{		
		$this->db->where('idEstudiante',$idEstudiante);
		$this->db->update('estudiante',$data);
	}

	public function listaestudiantesinactivados()
	{
		$this->db->select('*');
		$this->db->from('estudiante');
		$this->db->where('estado',0);
		return $this->db->get(); //debolución del resultado de la consulta
	}
}