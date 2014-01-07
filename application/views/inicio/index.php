<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Inicie sesion o registrese para comenzar.</h2>

<?php
echo form_open();
?>

<div class="campoForm">
	<label for="usuario">Usuario</label>
	<input type="text" size="25" name="usuario" required>
	<span class="obligatorio">(*)</span>
</div>

<div class="campoForm">
	<label for="password">Password</label>
	<input type="password" size="25" name="password" required>
	<span class="obligatorio">(*)</span>
</div>
<div>
	<input type="submit" value="Iniciar Sesion">
</div>

<?php form_close();?>

<br>

<?php echo anchor('inicio/registro', 'Registrarse'); ?>

<hr>


<?php
$this->load->view('inc/pie.inc.php');
?>