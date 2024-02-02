<?php

	include_once '../../model/panier.php';
	include_once '../../controller/pannierCRUD.php';
	
	$panierCRUD=new panierCRUD();

	$panierCRUD->Supprimerpanier($_GET["id_panier"]);

	header('Location:panier.php');
	
?>
