<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tercertrimestre extends CI_Controller {

	public function mapauno()
	{
		$this->load->view('mapauno');
	}
	
	public function mapados()
	{
		$this->load->view('mapados');
	}

	public function mapatres()
	{
		$this->load->view('mapatres');
	}

	public function widgetsfacebook()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('widgetsfacebook');
		$this->load->view('includes/footer');
	}
}
