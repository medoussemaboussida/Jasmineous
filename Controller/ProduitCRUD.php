<?php

	include_once '../../config.php';
	include_once '../../Model/Produit.php';
	
   //class crud
	class ProduitCRUD
{
	//affichage produit
		function AfficherProduit()
		{
			$sql="SELECT * FROM produits INNER JOIN categories ON id_cat=categorie_produit";
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

    //ajout produit
		function AjouterProduit($produit)
		{
			$sql="INSERT INTO produits (nom_produit, categorie_produit, quantite_produit, prix_produit, image_produit) 
			VALUES (:nom_produit, :categorie_produit, :quantite_produit, :prix_produit, :image_produit)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'nom_produit'=>$produit->get_nom_produit(),
					'categorie_produit'=>$produit->get_categorie_produit(),
					'quantite_produit'=>$produit->get_quantite_produit(),
					'prix_produit'=>$produit->get_prix_produit(),
					'image_produit'=>$produit->get_image_produit()
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		//recuperer les donnees de produit avec son id 

		function RecupererProduit($id_produit)
		{
			$sql="SELECT * from produits where id_produit=$id_produit";
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
		
		//modifier produit

		function ModifierProduit($produit, $id_produit)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE produits SET 
						nom_produit= :nom_produit, 
						categorie_produit= :categorie_produit, 
						quantite_produit= :quantite_produit, 
						prix_produit= :prix_produit,
						image_produit= :image_produit
					WHERE id_produit= :id_produit"
				);
				$query->execute([
					'nom_produit'=>$produit->get_nom_produit(),
					'categorie_produit'=>$produit->get_categorie_produit(),
					'quantite_produit'=>$produit->get_quantite_produit(),
					'prix_produit'=>$produit->get_prix_produit(),
					'image_produit'=>$produit->get_image_produit(),
					'id_produit'=>$id_produit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			}
			catch (PDOException $e)
			{
				$e->getMessage();
			}
		}
		
		//supprimer produit
		function SupprimerProduit($id_produit)
		{
			$sql="DELETE FROM produits WHERE id_produit=:id_produit";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit', $id_produit);
			try
			{
				$req->execute();
			}
			catch(Exception $e)
			{
				die('Erreur:'. $e->getMessage());
			}
		}

		//trie croissant selon prix
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

		//trie decroissant selon prix 

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

		//chercher un produit avec le nom
		function Rechercher($Nom_Prod)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM produits INNER JOIN categories ON id_cat=categorie_produit WHERE nom_produit LIKE '%$Nom_Prod%' ");
				$query->execute(/*['nom_produit'=>$Nom_Prod]*/);
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function Recuperer($ids)
		{
			$product=$sql="SELECT * FROM produits WHERE id_produit=$ids ";
$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute();

				$product=$query->fetch();
				return $product;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}
    }
	
?>