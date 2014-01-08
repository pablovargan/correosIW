<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<?php
echo form_open($action);
?>
<!--Nombre-->
<div class="addContactoForm">
	<label for="nombre">Nombre</label>
	<input type="text" size="75" name="nombre" required>
	<span class="obligatorio">(*) </span>
</div>
<!--Email-->
<div class="addContactoForm">
	<label for="email">Email</label>
	<input type="text" size="25" name="email" required>
	<span class="obligatorio">(*) </span>
</div>
<!--Validar-->
<div>
	<input type="submit" value="Agregar">
</div>
<br>
<?php form_close();
echo anchor('contactos/index', 'Volver');
?>

<?php
$this->load->view('inc/pie.inc.php');
?>