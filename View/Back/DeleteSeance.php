<?php

	include_once '../../Model/Seance.php';
	include_once '../../Controller/SeanceCRUD.php';
	
	$seanceCRUD=new seanceCRUD();

	$seanceCRUD->Supprimerseance($_GET["id_seance"]);

	header('Location:Seance.php');
	
?>
