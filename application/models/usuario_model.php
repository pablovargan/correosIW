<?php

class usuario_model extends CI_Model {

	// Nombre de la tabla
	private $tabla = 'Usuario';

	// Busca un usuario en concreto y lo devuelve
	function buscar($email)
	{
		$this->db->where('email', $email);
		return $this->db->get($this->tabla);
	}

	// Guarda un usuario en la BBDD
	function registrar($dato)
	{
		$item = array('email' => $dato['email'], 'password' => $dato['password'], 
			'nombre' => $dato['nombre'], 'apellidos' => $dato['apellidos'] );

		$this->db->insert($this->tabla, $item);

		$id = $this->db->insert_id();
		return $id;
	}

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */

?>