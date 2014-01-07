<?php
$this->load->view('inc/cabecera.inc.php');
?>

<h2>Bandeja de entrada.</h2>


<?php echo ("$cuantos correos recibidos."); ?>
<br>
<?php echo $listado; ?>
<br>

<?php
$this->load->view('inc/pie.inc.php');
?>