<?php

class contacto_model extends CI_Model {
	// Nombre de la tabla
	private $tabla = 'Contacto';

	function mostrarContactos($propietario)
	{
		$this->db->where('propietario', $propietario);
		$this->db->order_by('nombre', 'asc');
		return $this->db->get($this->tabla)->result();
	}

	function cuentaContactos($propietario)
	{
		$this->db->where('propietario', $propietario);
		return $this->db->get($this->tabla)->num_rows();
	}

	// Añade un contacto en la BBDD
	function addContacto($dato)
	{
		$item = array('nombre' => $dato['nombre'], 'email' => $dato['email'],
					'propietario' => $dato['propietario']);

		$this->db->insert($this->tabla, $item);

		$id = $this->db->insert_id();
		return $id;
	}

	function buscar($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->tabla);
	}

	function borrar($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tabla);
	}
}

?>