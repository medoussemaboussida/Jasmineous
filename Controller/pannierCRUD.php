<?php
include_once '../../config.php';
include_once '../../Model/panier.php';
	class panierCRUD
	{
		function Afficherpanier()
		{
			$sql="SELECT * FROM panier ";
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
		function Recupererpanier($id_panier)
		{
			$sql="SELECT * from panier where id_panier=$id_panier";
			$db=config::getConnexion();
			try
			{
				$query=$db->prepare($sql);
				$query->execute();

				$panier=$query->fetch();
				return $panier;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}

		function Supprimerpanier($id_panier)
		{
			$sql="DELETE FROM panier WHERE id_panier=:id_panier";
			$db=config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_panier', $id_panier);
			try
			{
				$req->execute();
			}
			catch(Exception $e)
			{
				die('Erreur:'. $e->getMessage());
			}
		}

		function TriePrixASC()
		{
			$db=config::getConnexion();
			try {
				$query = $db->query("SELECT * FROM panier  ORDER BY prix_total ASC");
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
				$query = $db->query("SELECT * FROM panier  ORDER BY prix_total DESC");
				$liste=$query->fetchALL();
				return $liste;
			   
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }

	function Ajouterpanier($panier)
	{
		$sql="INSERT INTO panier (quantite,prix_total) VALUES (:tel)";
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

?>