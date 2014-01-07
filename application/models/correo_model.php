<?php

class correo_model extends CI_Model {

	// Nombre de la tabla
	private $tabla = 'Correo';

	function bandejaEntrada($email)
	{
		$this->db->where('destinatario', $email);
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tabla)->result();
	}

	function cuenta_emails($email)
	{
		$this->db->where('destinatario', $email);
		return $this->db->get($this->tabla)->num_rows();
	}
	

}

?>