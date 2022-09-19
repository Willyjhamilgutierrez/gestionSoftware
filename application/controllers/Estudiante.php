<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Database\Query;

class Estudiante extends CI_Controller {

	public function index()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista; // array relacursoonal

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('listaestudiantes',$data);
		$this->load->view('includes/footer');
	}

	public function invitado()
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista; // array relacursoonal

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('panelestudianteinvitado',$data);
		$this->load->view('includes/footer');
	}

	public function agregar()
	{		
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('formularioestudiante');
		$this->load->view('includes/footer');
	}

	public function agregarbd()
	{		
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['nombres']=$_POST['nombres'];
		$data['curso']=$_POST['curso'];
		$data['edad']=$_POST['edad'];
        $data['nota']=$_POST['nota'];

		$lista=$this->estudiante_model->agregarestudiante($data);
		redirect('estudiante/index','refresh');
	}

	public function eliminarbd()
	{
		$idEstudiante = $_POST['idEstudiante'];
		$this->estudiante_model->eliminarestudiante($idEstudiante);
		redirect('estudiante/index','refresh');
	}

	public function modificar()
	{
		// PRIMERO EN EL MODELO DEBEMOS RECUPERAR LA LISTA Y LUEGO TRABAJAMOS AQUÍ EL CONTROLADOR
		$idEstudiante=$_POST['idEstudiante'];
		// COMO DEBE LLEGAR ESTA INFORMAcursoÓN A VISTA, ENTONCES SE UTILIZA "DATA" PARA QUE PUEDA SER ALMACENADO Y MOSTRADO
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idEstudiante); 

		// AQUÍ VIENE LA VISTA LLAMADA POR EL CONTROLADOR DADO EL MODELO ANTERIOR
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('formulariomodificarestudiante',$data);
		$this->load->view('includes/footer');
	}

	public function modificarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];
		
		$data['apellidoPaterno']=$_POST['apellidoPaterno'];
		$data['apellidoMaterno']=$_POST['apellidoMaterno'];
		$data['nombres']=$_POST['nombres'];
		$data['curso']=$_POST['curso'];
		$data['edad']=$_POST['edad'];
        $data['nota']=$_POST['nota'];

		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function inactivarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];

		$data['estado']=0;
		
		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function verinactivos()
	{
		$lista=$this->estudiante_model->listaestudiantesinactivados();
		$data['estudiantes']=$lista; // array relacursoonal

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('listaestudiantesinactivos',$data);
		$this->load->view('includes/footer');
	}

	public function activarbd()
	{
		$idEstudiante=$_POST['idEstudiante'];

		$data['estado']=1;
		
		$this->estudiante_model->modificarestudiante($idEstudiante,$data);
		redirect('estudiante/verinactivos','refresh');
	}

	public function import()
	{
		helper(['form', 'url']);
		if ($this->request->getMethod()=='post') {
			$ruta = 'uploads/';
			if (!is_dir($ruta)) {
				mkdir($ruta,0755);
			}
			$file = $this->request->getFile('file_excel');
			if (!$file->isValid()) {
				throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
			} else {
				$name_file = $file->getName();
				$file->move($ruta);
				if ($file->hasMoved()) {
					$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
					$spreadsheet = $reader->load($ruta.$name_file);
					$sheet = $spreadsheet->getSheet(0);
					$db = \Config\Database::connect();
					$builder = $db->table('estudiante');
					$number_estudiantes = 0;
					$imported_estudiantes = 0;
					$arr_errors = [];
					$arr_data_estudiantes = [];
					foreach ($sheet->getRowIterator(2) as $row) {
						$ap_paterno = trim($sheet->getCellByColumnAndRow(1,$row->getRowIndex()));
						$ap_materno = trim($sheet->getCellByColumnAndRow(2,$row->getRowIndex()));
						$nombres = trim($sheet->getCellByColumnAndRow(3,$row->getRowIndex()));
						$curso = trim($sheet->getCellByColumnAndRow(4,$row->getRowIndex()));
						$edad = trim($sheet->getCellByColumnAndRow(5,$row->getRowIndex()));
						$nota = trim($sheet->getCellByColumnAndRow(6,$row->getRowIndex()));
						if ($ap_paterno == '' || $ap_materno == '' || $nombres == '' || $curso == '' || $edad == '' || $nota == '')
							continue;
						
						$data_estudiante = ['apellidoPaterno'=>$ap_paterno,'apellidoMaterno'=>$ap_materno,'nombres'=>$nombres,'curso'=>$curso,'edad'=>$edad,'nota'=>$nota];
						$arr_data_estudiantes[] = $data_estudiante;
						$number_estudiantes++;
					}
					$imported_estudiantes = $builder->insertBatch($arr_data_estudiantes);
					$data['imported_estudiantes'] = $imported_estudiantes;
					$data['number_estudiantes'] = $number_estudiantes;
					$data['_view'] = 'estudiante/index';
					return redirect('index',$data);
				}
			}
		} else {
			$data['_view']='estudiante/import';
			return redirect('index', $data);
		}
	}
}
