<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Profesor extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
			$lista=$this->profesor_model->listaprofesores();
			$data['profesores']=$lista; // array relacional

			$this->load->view('includes/header');
			$this->load->view('includes/nav');
			$this->load->view('lista',$data);
			$this->load->view('includes/footer');
		} else {
			$this->load->view('includes/header');
			$this->load->view('login');
			$this->load->view('includes/footer');
		}		
	}	

	public function agregar()
	{		
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('formulario');
		$this->load->view('includes/footer');
	}

	public function agregarbd()
	{
		$data['rda']=$_POST['rda'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['nombres']=$_POST['nombres'];
		$data['ci']=$_POST['ci'];
		$data['especialidad']=$_POST['especialidad'];

		$lista=$this->profesor_model->agregarprofesor($data);
		redirect('profesor/index','refresh');
	}

	public function eliminarbd()
	{
		$idProfesor = $_POST['idProfesor'];
		$this->profesor_model->eliminarprofesor($idProfesor);
		redirect('profesor/index','refresh');
	}

	public function modificar()
	{
		// PRIMERO EN EL MODELO DEBEMOS RECUPERAR LA LISTA Y LUEGO TRABAJAMOS AQUÍ EL CONTROLADOR
		$idProfesor=$_POST['idProfesor'];
		// COMO DEBE LLEGAR ESTA INFORMACIÓN A VISTA, ENTONCES SE UTILIZA "DATA" PARA QUE PUEDA SER ALMACENADO Y MOSTRADO
		$data['infoprofesor']=$this->profesor_model->recuperarprofesor($idProfesor); 

		// AQUÍ VIENE LA VISTA LLAMADA POR EL CONTROLADOR DADO EL MODELO ANTERIOR
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('formulariomodificar',$data);
		$this->load->view('includes/footer');
	}

	public function modificarbd()
	{
		$idProfesor=$_POST['idProfesor'];
		$data['rda']=$_POST['rda'];
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['nombres']=$_POST['nombres'];
		$data['ci']=$_POST['ci'];
		$data['especialidad']=$_POST['especialidad'];

		$nombrefoto=$idProfesor.".jpg";
		// Ruta donde se guardan los archivos
		$config['upload_path']='./uploads/';
		// Nombre del archivo
		$config['file_name']=$nombrefoto;
		$direccion="./uploads/".$nombrefoto;
		// Verificacion si existe el archivo entonces se borra
		if (file_exists($direccion)) {
			unlink($direccion);
		}
		// Tipos de archivo permitidos
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload()) {
			$data['error']=$this->upload->display_errors();
		} else {
			$data['foto']=$nombrefoto;
		}

		$this->profesor_model->modificarprofesor($idProfesor,$data);
		$this->upload->data();
		redirect('profesor/index','refresh');
	}

	public function inactivarbd()
	{
		$idProfesor=$_POST['idProfesor'];

		$data['estado']=0;
		
		$this->profesor_model->modificarprofesor($idProfesor,$data);
		redirect('profesor/index','refresh');
	}

	public function verinactivos()
	{
		$lista=$this->profesor_model->listaprofesoresinactivados();
		$data['profesores']=$lista; // array relacional

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('listainactivos',$data);
		$this->load->view('includes/footer');
	}

	public function activarbd()
	{
		$idProfesor=$_POST['idProfesor'];

		$data['estado']=1;
		
		$this->profesor_model->modificarprofesor($idProfesor,$data);
		redirect('profesor/verinactivos','refresh');
	}

	public function listaxlsx()
	{
		$lista=$this->profesor_model->listaprofesores();
		$lista=$lista->result();

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="profesores.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'ID');
		$sheet->setCellValue('B1', 'RDA');
		$sheet->setCellValue('C1', 'Nombres');
		$sheet->setCellValue('D1', 'Apellido Paterno');
		$sheet->setCellValue('E1', 'Apellido Materno');
		$sheet->setCellValue('F1', 'CI');
		$sheet->setCellValue('G1', 'Especialidad');
		$sn=2;
		foreach ($lista as $row) {
			$sheet->setCellValue('A'.$sn,$row->idProfesor);
			$sheet->setCellValue('B'.$sn,$row->rda);
			$sheet->setCellValue('C'.$sn,$row->nombres);
			$sheet->setCellValue('D'.$sn,$row->apellidoPaterno);
			$sheet->setCellValue('E'.$sn,$row->apellidoMaterno);
			$sheet->setCellValue('F'.$sn,$row->ci);
			$sheet->setCellValue('G'.$sn,$row->especialidad);
			$sn++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");		
	}
}