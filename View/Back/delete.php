<?php

include_once '../../Controller/evenementController.php';
$evenementController = new evenementController();
    $id = $_GET['id_e'];
    $evenementController->deleteById($id);
    header('location: evenement.php');

?>