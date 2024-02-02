<?php

	include_once '../../config.php';
	include_once '../../Model/commande.php';
	
	class commandeCRUD
	{
		function Affichercommande()
		{
			$sql="SELECT * FROM commande ";
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

		function Ajoutercomande($commande)
		{
			$sql="INSERT INTO commande (panier,pay,adda,code_post,f_name,l_name,tel) VALUES (:panier,:pay,:adda,:code_post,:f_name,:l_name,:tel)";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute([
					'panier'=>$commande->get_panier(),
					'pay'=>$commande->get_pay(),
					'adda'=>$commande->get_adda(),
					'code_post'=>$commande->get_code_post(),
					'f_name'=>$commande->get_f_name(),
					'l_name'=>$commande->get_l_name(),
                    'tel'=>$commande->get_tel()
				]);			
			}
			catch (Exception $e)
			{
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function Recuperercommande ($id_commande)
		{
			$sql="SELECT * from commande where id_commande=$id_commande";
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
		
		function Modifiercommande($commande,$id_commande)
		{
			try
			{
				$db=config::getConnexion();
				$query=$db->prepare(
					"UPDATE commande SET
					panier=:panier,
						pay=:pay, 
						adda=:adda, 
						code_post=:code_post, 
						f_name=:f_name,
						l_name=:l_name,
                        tel=:tel
					WHERE id_commande=:id_commande"
				);
				$query->execute([
					'panier'=>$commande->get_panier(),
					'pay'=>$commande->get_pay(),
					'adda'=>$commande->get_adda(),
					'code_post'=>$commande->get_code_post(),
					'f_name'=>$commande->get_f_name(),
					'l_name'=>$commande->get_l_name(),
                    'tel'=>$commande->get_tel(),
					'id_commande'=>$id_commande
				]);
				echo $query->rowCount()."records UPDATED successfully<br>";
			}
			catch (PDOException $e)
			{
				 $e->getMessage();
			}
		}
		
		function Supprimercommande($id_commande)
		{
			$sql="DELETE FROM commande  WHERE id_commande=:id_commande ";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_commande', $id_commande);
			try
			{
				$req->execute();
			}
			catch(Exception $e)
			{
				die('Erreur:'. $e->getMessage());
			}
		}

		function TrieASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM commande ORDER BY f_name ASC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function TrieDESC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM commande  ORDER BY f_name DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function Rechercher($name)
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM commande  WHERE l_name LIKE '%$name%' ");
				$query->execute(/*['l_name'=>$name]*/);
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }

?>