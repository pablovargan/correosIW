<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		session_start();
		$this->load->model('correo_model', '', TRUE);
	}

	public function index()
	{
		$data['tituloHead']="Correo en JudasMail";
		$data['tituloBody']="Bandeja de Entrada";

		$datos = $this->correo_model->bandejaEntrada($_SESSION["email"]);
		$data['cuantos']= $this->correo_model->cuenta_emails($_SESSION["email"]);

		$this->load->library('table');

		$data['listado'] = "No se han encontrado emails.";

		if($data['cuantos'] > 0){
			$this->table->set_heading('Id', 'Emisor', 'Destinatario');
			$this->table->set_empty('&nbsp;');

			foreach ($datos as $item) {
				$this->table->add_row($item->id, $item->emisor, anchor('correo/detalle/'.$item->id, $item->asunto));
			}

			$data['listado'] = $this->table->generate();
		}
		$this->load->view('correo/index', $data);
	}

	public function detalle($id)
	{
		$data['tituloHead']="Detalle del email";
		$data['tituloBody']="Detalle del email";
		$data['link_atras']=anchor('correo/index', 'Volver al listado');

		$data['tupla'] = $this->correo_model->buscar($id)->row();

		$this->load->view('correo/detalle', $data);
	}

}