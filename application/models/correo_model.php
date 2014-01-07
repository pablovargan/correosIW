<?php

class correo_model extends CI_Model {

	// Nombre de la tabla
	private $tabla = 'Correo';

	// Select's para mostrar emails dependiendo emisor/receptor
	function bandejaEntrada($email)
	{
		$this->db->where('destinatario', $email);
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tabla)->result();
	}
	function bandejaSalida($email)
	{
		$this->db->where('emisor', $email);
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->tabla)->result();
	}

	// Cantidad de emails de entrada y salida
	function cuenta_emailsEntrada($email)
	{
		$this->db->where('destinatario', $email);
		return $this->db->get($this->tabla)->num_rows();
	}
	function cuenta_emailsSalida($email)
	{
		$this->db->where('emisor', $email);
		return $this->db->get($this->tabla)->num_rows();
	}
	
	// Busca un email en concreto y lo devuelve
	function buscar($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->tabla);
	}

	// Guarda un email en la BBDD
	function enviarEmail($dato)
	{
		$item = array('emisor' => $dato['emisor'], 'destinatario' => $dato['destinatario'], 
			'asunto' => $dato['asunto'], 'mensaje' => $dato['mensaje'] );

		$this->db->insert($this->tabla, $item);

		$id = $this->db->insert_id();
		return $id;
	}

}

?>