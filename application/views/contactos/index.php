<?php
$this->load->helper('form');
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Contactos</h2>
<?php echo ("$cuantosContactos contactos encontrados.") ?>
<br>
<?php echo $listadoContactos; ?>
<br>
<?php echo anchor('contactos/add', 'Añadir Contacto'); ?>
<br>
<?php echo anchor('correo/index', 'Volver'); ?>
<?php
$this->load->view('inc/pie.inc.php');
?>