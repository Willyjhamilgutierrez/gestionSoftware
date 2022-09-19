<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$data['msg']=$this->uri->segment(3);
		if ($this->session->userdata('login')) {
			// Usuario logueado
			redirect('usuarios/panel', 'refresh');
		} else {
			// Usuario no logueado
			$this->load->view('includes/header');
			$this->load->view('login',$data);
			$this->load->view('includes/footer');
		}
	}	

	public function prueba()
	{
		$query=$this->db->get('profesor');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}

	public function validar()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if ($consulta->num_rows() > 0) {
			// Validacion efectiva
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
			}			
		} else {
			// no hay validacion
			redirect('usuarios/index/2','refresh');
		}
	}

	public function panel()
	{
		if ($this->session->userdata('login')) {
			if ($this->session->userdata('tipo')=='admin') {
				// El usuario ya está logueado
				redirect('profesor/index', 'refresh');
			} else {
				redirect('estudiante/invitado','refresh');
			}
		} else {
			// Usuario no logueado
			redirect('usuarios/index/3', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuarios/index/1','refresh');
	}
}