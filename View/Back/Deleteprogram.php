<?php

	include_once '../../Model/program.php';
	include_once '../../Controller/programCRUD.php';
	
	$programCRUD=new programCRUD();

	$programCRUD->Supprimerprogram($_GET["id_demande"]);

	header('Location:programe.php');
	
?>
