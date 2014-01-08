<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		session_start();
		$this->load->model('contacto_model', '', TRUE);
	}

	public function index()
	{
		$data['tituloHead']="Contactos en JudasMail";
		$data['tituloBody']="Contactos de ".$_SESSION["email"];
		// Libreria para generar la tabla
		$this->load->library('table');

		// Obtengo los contactos en el modelo por el propietario
		$datos = $this->contacto_model->mostrarContactos($_SESSION['email']);
		$data['cuantosContactos'] = $this->contacto_model->cuentaContactos($_SESSION['email']);

		$data['listadoContactos'] = "No se han encontrado contactos.";

		// Las preparo y envio a la vista
		if($data['cuantosContactos'] > 0) {
			$this->table->set_heading('Nombre', 'Email', 'Operaciones');
			$this->table->set_empty('&nbsp;');

			foreach ($datos as $item) {
				$this->table->add_row($item->nombre, $item->email,
					anchor('contactos/borrar/'.$item->id, 'Borrar', array("onclick" => "return confirm('¿Esta seguro que desea eliminar el contacto?')")));
			}

			$data['listadoContactos'] = $this->table->generate();
		}

		$this->load->view('contactos/index', $data);
	}

	// Lleva a la vista de agregar contacto
	public function add() 
	{
		$data['tituloHead']="JudasMail";
		$data['tituloBody']="Añadir contacto ";
		$data['action']='contactos/nuevoContacto';
		$this->load->view('contactos/nuevo', $data);
	}

	public function nuevoContacto()
	{
		$dato = array('email' => $this->input->post('email'),
				'nombre' => $this->input->post('nombre'),
				'propietario' => $_SESSION['email']);
		$this->contacto_model->addContacto($dato);
		redirect('contactos/index', 'refresh');
	}

	public function borrar($id)
	{
		$tupla = $this->contacto_model->buscar($id)->row();
		if(isset($tupla) && count($tupla) >0){
			$this->contacto_model->borrar($id);			
		} else {
			$_SESSION["error"] = "Error al borrar el dato seleccionado";
		}
		
		redirect('contactos/index', 'refresh');
	}
}