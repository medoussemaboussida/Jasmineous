<?php

    include_once '../../Model/commande.php';
    include_once '../../Controller/commandeCRUD.php';
	
	$commandeCRUD=new commandeCRUD();

	$commandeCRUD->Supprimercommande($_GET["id_commande"]);
	
	header('Location:commande.php');
	
?>