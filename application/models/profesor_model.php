<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor_model extends CI_Model {

	public function listaprofesores()
	{
		$this->db->select('*');
		$this->db->from('profesor');
		$this->db->where('estado',1);
		// $this->db->where('nota<=',61); CONSULTA PARA CONDICIONALES
		return $this->db->get(); //debolución del resultado de la consulta
	}

	public function agregarprofesor($data)
	{
		$this->db->insert('profesor',$data);
	}

	public function eliminarprofesor($idProfesor)
	{
		$this->db->where('idProfesor',$idProfesor);
		$this->db->delete('profesor');
	}

	public function recuperarprofesor($idProfesor)
	{
		$this->db->select('*');
		$this->db->from('profesor');
		$this->db->where('idProfesor',$idProfesor);
		return $this->db->get(); //debolución del resultado de la consulta
	}

	public function modificarprofesor($idProfesor,$data)
	{		
		$this->db->where('idProfesor',$idProfesor);
		$this->db->update('profesor',$data);
	}

	public function listaprofesoresinactivados()
	{
		$this->db->select('*');
		$this->db->from('profesor');
		$this->db->where('estado',0);
		return $this->db->get(); //debolución del resultado de la consulta
	}
}