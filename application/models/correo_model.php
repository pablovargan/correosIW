<?php

class correo_model extends CI_Model {

	// Nombre de la tabla
	private $tabla = 'Correo';

	function bandejaEntrada()
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tabla)->result();
	}

	function cuenta_emails(){
		return $this->db->count_all($this->tabla);
	}
	

}

?>