<?php

require '../../Controller/reclamationC.php';
$reclamationController = new reclamationController();
    $id_rec = $_GET['id_rec'];
    $reclamationController->deleteReclam($id_rec);
    header('location: evenement.php');

?>