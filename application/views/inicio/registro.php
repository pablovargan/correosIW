<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Rellena los campos para registrarte.</h2>

<?php
echo form_open($action);
?>
<!--Usuario-->
<div class="campoForm">
	<label for="email">Usuario</label>
	<input type="text" size="25" name="email" required>
	<span class="obligatorio">(*) 
		<?php if(isset($_SESSION["error"]) && $_SESSION["error"] != "") {
					echo $_SESSION["error"];
					session_unset($_SESSION["error"]);
				}
		?>
	</span>
</div>
<!--Password-->
<div class="campoForm">
	<label for="password">Contraseña</label>
	<input type="password" size="25" name="password" required>
	<span class="obligatorio">(*)</span>
</div>
<!--Repetir Password-->
<div class="campoForm">
	<label for="repetirPassword">Confirma tu contraseña</label>
	<input type="password" size="25" name="password" required>
	<span class="obligatorio">(*)</span>
</div>
<!--Nombre-->
<div class="campoForm">
	<label for="nombre">Nombre</label>
	<input type="text" size="25" name="nombre" required>
	<span class="obligatorio">(*)</span>
</div>
<!--Apellidos-->
<div class="campoForm">
	<label for="apellidos">Apellidos</label>
	<input type="text" size="50" name="apellidos" required>
	<span class="obligatorio">(*)</span>
</div>

<div>
	<input type="submit" value="Registrarse">
</div>

<br>
<br>
<?php form_close();

echo anchor('inicio/index', 'Volver a inicio');

?>



<hr>
<?php
$this->load->view('inc/pie.inc.php');
?>