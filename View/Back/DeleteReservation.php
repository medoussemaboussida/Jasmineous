<?php

    include_once '../../Model/Reservation.php';
    include_once '../../Controller/ReservationCRUD.php';
	
	$reservationCRUD=new reservationCRUD();

	$reservationCRUD->Supprimerreservation($_GET["id_reservation"]);
	
	header('Location:Reservation.php');
	
?>