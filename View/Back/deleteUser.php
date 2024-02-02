<?php
include '../../Controller/UserC.php';
$userC = new UserC();
$userC->deleteUser($_GET["id"]);
header('Location:ListUsers.php');
