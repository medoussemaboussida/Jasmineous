<?php

	include_once '../../config.php';
	include_once '../../Model/Categorie.php';
	
	class reservationCRUD
	{
		function Afficherreservation()
		{
			$sql="SELECT * FROM reservation";
			$db=config::getConnexion();
			try
			{
				$liste=$db->query($sql);
				return $liste;
			}
			catch(Exception $e)
			{
				die('Erreur:'. $e->getMessage());
			}
		}

		function Ajouterreservation($reservation)
		{
			$sql="INSERT INTO reservation (type_reservation,username,email,date_reservation,phone,id_seance) 
			VALUES (:type_reservation,:username,:email,:date_reservation,:phone,:id_seance)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'type_reservation'=>$reservation->get_type_reservation(),
					'username'=>$reservation->get_username(),
					'email'=>$reservation->get_email(),
					'date_reservation'=>$reservation->get_date_reservation(),
					'phone'=>$reservation->get_phone(),
					'id_seance'=>$reservation->get_id_seance()
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function Recupererreservation($id_reservation)
		{
			$sql="SELECT * from reservation where id_reservation=$id_reservation";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function Modifierreservation($reservation, $id_reservation)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE reservation SET 
					type_reservation= :type_reservation, 
						username= :username, 
						email= :email, 
						date_reservation= :date_reservation,
						phone= :phone,
						id_seance= :id_seance
					WHERE id_reservation= :id_reservation"
				);
				$query->execute([
					'type_reservation'=>$reservation->get_type_reservation(),
					'username'=>$reservation->get_username(),
					'email'=>$reservation->get_email(),
					'date_reservation'=>$reservation->get_date_reservation(),
					'phone'=>$reservation->get_phone(),
					'id_seance'=>$reservation->get_id_seance(),
					'id_reservation'=>$id_reservation
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}
			catch (PDOException $e)
			{
				$e->getMessage();
			}
		}

        function Supprimerreservation($id_reservation)
		{
			$sql="DELETE FROM reservation WHERE id_reservation=:id_reservation";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_reservation', $id_reservation);
			try
			{
				$req->execute();
			}
			catch(Exception $e)
			{
				die('Erreur:'. $e->getMessage());
			}
		}
/*
		function TrierNomCatASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM categories ORDER BY nom_cat ASC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function TrierNomCatDESC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM categories ORDER BY nom_cat DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}*/
	}
	
?>