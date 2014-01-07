<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		session_start();
		$this->load->model('usuario_model', '', TRUE);

	}

	public function index()
	{
		$data['tituloHead']="Bienvenido a JudasMail";
		$data['tituloBody']="JudasMail";

		$this->load->view('inicio/index', $data);
	}

	public function registro()
	{
		$data['tituloHead']="JudasMail";
		$data['tituloBody']="Registrate en JudasMail";
		$data['action']='inicio/nuevoUsuario';
		$this->load->view('inicio/registro', $data);
	}

	public function nuevoUsuario()
	{
		$dato = array('email' => $this->input->post('email').'@judasmail.com',
					'password' => $this->input->post('password'),
					'nombre' => $this->input->post('nombre'),
					'apellidos' => $this->input->post('apellidos'));

		$usuario = $this->usuario_model->buscar($dato['email'])->row();
		if(isset($usuario) && count($usuario) >0)
		{
			$_SESSION['error'] = "El nombre de usuario ya existe";
			redirect('inicio/registro', 'refresh');
		}
		else
		{
			$this->usuario_model->registrar($dato);
			redirect('inicio/index', 'refresh');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */