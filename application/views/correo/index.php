<?php
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Bandeja de entrada.</h2>
<?php echo ("$cuantosEntrada correos recibidos."); ?>
<br>
<?php echo $listadoEntrada; ?>
<br>

<h2>Bandeja de salida.</h2>
<?php echo ("$cuantosSalida correos enviados."); ?>
<br>
<?php echo $listadoSalida; ?>
<br>
<?php echo  anchor('correo/nuevo', 'Nuevo correo'); ?>
<br>
<?php echo  anchor('contactos/index', 'Contactos'); ?>
<br>
<?php echo  anchor('inicio/logout', 'Cerrar sesion'); ?>
<br>

<?php
$this->load->view('inc/pie.inc.php');
?>