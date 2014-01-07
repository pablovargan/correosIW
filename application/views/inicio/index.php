<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Inicie sesion o registrese para comenzar.</h2>

<?php
echo form_open($login);
?>

<div class="campoForm">
	<label for="email">Usuario</label>
	<input type="text" size="25" name="email" required>
	<span class="obligatorio">(*)</span>
</div>

<div class="campoForm">
	<label for="password">Password</label>
	<input type="password" size="25" name="password" required>
	<span class="obligatorio">(*)</span>
</div>
<div>
	<input type="submit" value="Iniciar Sesion">
	<span>
		<?php 
			if(isset($_SESSION["error_login"]) && $_SESSION["error_login"] != ""){
				echo $_SESSION["error_login"];
				session_unset($_SESSION["error_login"]);
			}
		?>
	</span>
</div>

<?php form_close();?>

<br>

<?php echo anchor('inicio/registro', 'Registrarse'); ?>

<hr>


<?php
$this->load->view('inc/pie.inc.php');
?>