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
		$data['login']="inicio/login";

		$this->load->view('inicio/index', $data);
	}

	// Muestra la pagina para crear el registro
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
			// Hago login
			$_SESSION['email'] = $dato['email'];
			redirect('correo/index', 'refresh');
		}
	}

	public function login()
	{
		$datos = array('email' => $this->input->post('email'),
					   'password' => $this->input->post('password') );

		$usuario = $this->usuario_model->buscar($datos['email'])->row();

		if(isset($usuario) && count($usuario) >0)
		{
			if ($usuario->password == $datos['password']) {
				$_SESSION['email'] = $usuario->email;
				redirect('correo/index');
			} else {
				$_SESSION['error_login'] = "Los datos de acceso no son correctos";
				redirect('inicio/index', 'refresh');
			}
		} else {
			$_SESSION['error_login'] = "Usuario no encontrado";
			redirect('inicio/index', 'refresh');
		}

	}

	public function logout()
	{
		if(isset($_SESSION["email"])){
			session_destroy();
		}

		redirect("inicio/index");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */