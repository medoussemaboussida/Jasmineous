<?php

	include_once '../../config.php';
	include_once '../../Model/program.php';
	
	class programCRUD
	{
		function Afficherprogram()
		{
			$sql="SELECT * FROM program ";
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

		function Ajouterprogram($program)
		{
			$sql="INSERT INTO program (type_demande,Desc_diet,Desc_workout) 
			VALUES ( :type_demande, :Desc_diet, :Desc_workout)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					
					'type_demande'=>$program->get_type_demande(),
					'Desc_diet'=>$program->get_Desc_diet(),
					'Desc_workout'=>$program->get_Desc_workout()
					
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function Recupererprogram($id_demande)
		{
			$sql="SELECT * from program where id_demande=$id_demande";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function Modifierprogram($program, $id_demande)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE program SET 
						type_demande= :type_demande, 
						Desc_diet= :Desc_diet, 
						Desc_workout= :Desc_workout
					WHERE id_demande= :id_demande"
				);
				$query->execute([
					'type_demande'=>$program->get_type_demande(),
					'Desc_diet'=>$program->get_Desc_diet(),
					'Desc_workout'=>$program->get_Desc_workout(),
				
					'id_demande'=>$id_demande
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}
			catch (PDOException $e)
			{
				$e->getMessage();
			}
		}
		
		function Supprimerprogram($id_demande)
		{
			$sql="DELETE FROM program WHERE id_demande=:id_demande";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_demande', $id_demande);
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
		function TriePrixASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM produits INNER JOIN categories ON id_cat=categorie_produit ORDER BY prix_produit ASC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function TriePrixDESC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM produits INNER JOIN categories ON id_cat=categorie_produit ORDER BY prix_produit DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function Rechercher($Nom_Prod)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM produits INNER JOIN categories ON id_cat=categorie_produit WHERE nom_produit LIKE '%$Nom_Prod%' ");
				$query->execute(/*['nom_produit'=>$Nom_Prod]);
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	*/	
	}

?>