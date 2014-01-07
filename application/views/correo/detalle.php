<?php
$this->load->view('inc/cabecera.inc.php');
?>

<table>
	<tr>
		<td>Asunto</td>
		<td style="font-weight:bold"><?php echo $tupla->asunto;?></td>
	</tr>
	<tr>
		<td>Emisor</td>
		<td style="font-weight:bold"><?php echo $tupla->emisor;?></td>
	</tr>
	<tr>
		<td>Mensaje</td>
		<td style="font-weight:bold"><?php echo $tupla->mensaje;?></td>
	</tr>
</table>

<hr>
<?php echo $link_atras; ?> 


<?php
$this->load->view('inc/pie.inc.php');
?>