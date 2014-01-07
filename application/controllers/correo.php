<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		session_start();
		//$this->load->model('correo_model', '', TRUE);
	}

	public function index()
	{
		$data['tituloHead']="Correo en JudasMail";
		$data['tituloBody']="Bandeja de Entrada";

		$datos = $this->correo_model->bandejaEntrada();
		$data['cuantos']= $this->datos_model->cuenta_emails();

		$this->load->library('table');

		$data['listado'] = "No se han encontrado emails.";

		if($data['cuantos'] > 0){
			$this->table->set_heading('Id', 'Emisor', 'Destinatario');
			$this->table->set_empty('&nbsp;');

			foreach ($datos as $item) {
				$this->table->add_row($item->id, $item->emisor, $item->asunto);
			}

			$data['listado'] = $this->table->generate();
		}
		$this->load->view('datos/index', $data);
	}

}