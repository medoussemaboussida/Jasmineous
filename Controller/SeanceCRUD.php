<?php

	include_once '../../config.php';
	include_once '../../Model/Produit.php';
	
	class seanceCRUD
	{
		function Afficherseance()
		{
			$sql="SELECT * FROM seances ";
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

		function Ajouterseance($seance)
		{
			$sql="INSERT INTO seances (type_seance,dure_seance, nbr_maximal, categorie, image_seance) 
			VALUES (:type_seance, :dure_seance, :nbr_maximal, :categorie, :image_seance)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'type_seance'=>$seance->get_type_seance(),
					'dure_seance'=>$seance->get_dure_seance(),
					'nbr_maximal'=>$seance->get_nbr_maximal(),
					'categorie'=>$seance->get_categorie(),
					'image_seance'=>$seance->get_image_seance()
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function Recupererseance($id_seance)
		{
			$sql="SELECT * from seances where id_seance=$id_seance";
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
		
		function Modifierseance($seance, $id_seance)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE seances SET 
						type_seance= :type_seance, 
						dure_seance= :dure_seance, 
						nbr_maximal= :nbr_maximal, 
						categorie= :categorie,
						image_seance= :image_seance
					WHERE id_seance= :id_seance"
				);
				$query->execute([
					'type_seance'=>$seance->get_type_seance(),
					'dure_seance'=>$seance->get_dure_seance(),
					'nbr_maximal'=>$seance->get_nbr_maximal(),
					'categorie'=>$seance->get_categorie(),
					'image_seance'=>$seance->get_image_seance(),
					'id_seance'=>$id_seance
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}
			catch (PDOException $e)
			{
				$e->getMessage();
			}
		}
		
		function Supprimerseance($id_seance)
		{
			$sql="DELETE FROM seances WHERE id_seance=:id_seance";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_seance', $id_seance);
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
	function TriePrixASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM seances  ORDER BY type_seance ASC");
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
				$query = $db->query("SELECT * FROM seances ORDER BY type_seance DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function Rechercher($type_seance)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM seances  WHERE type_seance LIKE '%$type_seance%' ");
			$query->execute(/*['nom_produit'=>$Nom_Prod]*/);
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	



	}

?>