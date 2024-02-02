<?php

    include_once '../../Model/demande.php';
    include_once '../../Controller/demandeCRUD.php';
	
	$demandeCRUD=new demandeCRUD();

	$demandeCRUD->Supprimerdemande($_GET["id_u"]);
	
	header('Location:demande.php');
	
?>