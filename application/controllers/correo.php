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
		if($_SESSION["email"] != '')
		{
			$data['tituloHead']="Correo en JudasMail";
			$data['tituloBody']="Correo de ".$_SESSION["email"];
			// Libreria para generar las tablas
			$this->load->library('table');

			// Obtenemos del modelo los correos que tienen como desinatario nuestra sesion y la cantidad
			$datos = $this->correo_model->bandejaEntrada($_SESSION["email"]);
			$data['cuantosEntrada']= $this->correo_model->cuenta_emailsEntrada($_SESSION["email"]);

			$data['listadoEntrada'] = "No se han encontrado emails de entrada.";

			// Se envian a la vista
			if($data['cuantosEntrada'] > 0){
				$this->table->set_heading('Id', 'Emisor', 'Asunto');
				$this->table->set_empty('&nbsp;');

				foreach ($datos as $item) {
					$this->table->add_row($item->id, $item->emisor, anchor('correo/detalle/'.$item->id, $item->asunto));
				}

				$data['listadoEntrada'] = $this->table->generate();
			}
			
			// Obtenemos del modelo los correos que tienen como emisor nuestra sesion y la cantidad
			$datosSalida = $this->correo_model->bandejaSalida($_SESSION["email"]);
			$data['cuantosSalida']= $this->correo_model->cuenta_emailsSalida($_SESSION["email"]);

			$data['listadoSalida'] = "No se han encontrado emails de salida.";
			if($data['cuantosSalida'] > 0){
				$this->table->set_heading('Id', 'Destinatario', 'Asunto');
				$this->table->set_empty('&nbsp;');

				foreach ($datosSalida as $item) {
					$this->table->add_row($item->id, $item->destinatario, anchor('correo/detalle/'.$item->id, $item->asunto));
				}

				$data['listadoSalida'] = $this->table->generate();
			}
			// Vamos a la vista
			$this->load->view('correo/index', $data);
		}
		else
		{
			$this->load->view('inicio/index', $data);
		}
		
	}

	public function detalle($id)
	{
		if($_SESSION["email"] != '')
		{
			$data['tituloHead']="Detalle del email";
			$data['tituloBody']="Detalle del email";
			$data['link_atras']=anchor('correo/index', 'Volver al listado');
			$data['responder']=anchor('correo/nuevo', 'Responder');

			// Obtenemos los detalles mediante el modelo y lo mostramos en la vista
			$data['tupla'] = $this->correo_model->buscar($id)->row();
			$this->load->view('correo/detalle', $data);
		}
		else
		{
			$this->load->view('inicio/index', $data);
		}
	}

	// Redirige a una nueva pagina para enviar los datos
	public function nuevo()
	{
		if($_SESSION["email"] != '')
		{
			$data['tituloHead']="JudasMail";
			$data['tituloBody']="Nuevo correo en JudasMail";
			$data['action']='correo/nuevoCorreo';
			$this->load->view('correo/nuevo', $data);
		}
		else
		{
			$this->load->view('inicio/index', $data);
		}

	}

	// Recoge los datos y los envia al modelo para insertarlos en la base de datos
	public function nuevoCorreo()
	{
		if($_SESSION["email"] != '')
		{
			$dato = array('emisor' => $_SESSION["email"],
						'destinatario' => $this->input->post('destinatario'),
						'asunto' => $this->input->post('asunto'),
						'mensaje' => $this->input->post('mensaje'));
			$this->correo_model->enviarEmail($dato);
			redirect('correo/index', 'refresh');
		}
		else
		{
			$this->load->view('inicio/index', $data);
		}
	}

}