<?php

    include_once '../../Model/Categorie.php';
    include_once '../../Controller/CategorieCRUD.php';
	
	$CategorieCRUD=new CategorieCRUD();
	//recuperation de id du categorie et supprimer
	$CategorieCRUD->SupprimerCategorie($_GET["id_cat"]);
	//retourner a la page principale
	header('Location:table.php');
	
?>