<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<?php 
echo form_open($action);
?>
<!--Destinatario-->
<div class="campoForm">
	<label for="destinatario">Destinatario</label>
	<input type="text" size="50" name="destinatario" required>
	<span class="obligatorio">(*)</span>
</div>
<!--Asunto-->
<div class="campoForm">
	<label for="asunto">Asunto</label>
	<input type="text" size="50" name="asunto" required>
	<span class="obligatorio">(*)</span>
</div>
<!--Mensaje-->
<div class="campoForm">
	<label for="mensaje">Mensaje</label>
	<textarea rows="4" cols="50" name="mensaje" required></textarea>
	<span class="obligatorio">(*)</span>
</div>

<div>
	<input type="submit" value="Enviar">
</div>

<?php form_close(); ?>

<hr>

<?php
$this->load->view('inc/pie.inc.php');
?>