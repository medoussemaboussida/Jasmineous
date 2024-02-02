<?php

	include_once '../../config.php';
	include_once '../../Model/demande.php';
	
	class demandeCRUD
	{
		function Afficherdemande()
		{
			$sql="SELECT * FROM demande";
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

		function Ajouterdemande($demande)
		{
			$sql="INSERT INTO demande (id_u,id_demande,poids,hauteur,age) 
			VALUES (:id_u, :id_demande, :poids, :hauteur, :age)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'id_u'=>$demande->get_id_u(),
					'id_demande'=>$demande->get_id_demande(),
					'poids'=>$demande->get_poids(),
					'hauteur'=>$demande->get_hauteur(),
					'age'=>$demande->get_age()
	
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function Recupererdemande($id_u)
		{
			$sql="SELECT * from demande where id_u=$id_u";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute();

				$demande=$query->fetch();
				return $demande;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function Modifierdemande($demande, $id_u)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE demande SET 
					id_demande= :id_demande, 
						hauteur= :hauteur, 
						poids= :poids, 
						age= :age
					
					WHERE id_demande= :id_demande"
				);
				$query->execute([
					'id_demande'=>$demande->get_id_demande(),
					'hauteur'=>$demande->get_hauteur(),
					'poids'=>$demande->get_poids(),
					'age'=>$demande->get_age(),
			
					'id_u'=>$id_u
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}
			catch (PDOException $e)
			{
				$e->getMessage();
			}
		}

        function Supprimerdemande($id_u)
		{
			$sql="DELETE FROM demande WHERE id_u=:id_u";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_u', $id_u);
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