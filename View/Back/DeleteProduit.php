<?php

	include_once '../../Model/Produit.php';
	include_once '../../Controller/ProduitCRUD.php';
	
	$ProduitCRUD=new ProduitCRUD();
	//recuperer id du produit puis supprimer le produit
	$ProduitCRUD->SupprimerProduit($_GET["id_produit"]);

	header('Location:form.php');
	
?>
