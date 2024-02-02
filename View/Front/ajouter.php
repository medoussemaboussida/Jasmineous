<?php 
	include_once '../../config.php';
   
    if(!isset($_SESSION)){
session_start();

    }
if(!isset($_SESSION['panier']))
{
    $_SESSION['panier']=array();
}
if(isset($_GET['id']))
{
$id= $_GET['id'];
$db=config::getConnexion();
$select_products = ("SELECT * FROM produits WHERE id_produit=$id"); 
$query=$db->prepare($select_products);
$query->execute();		
     if(empty($product=$query->fetch()))
     {
        die("wee");
     }
     if(isset($_SESSION['panier'][$id]))
     {
        $_SESSION['panier'][$id]++;
     }
     else{
        $_SESSION['panier'][$id]=1 ;

    
     }
     header("Location:indexPC.php");
}

if(isset($_GET['id']))
{
$id= $_GET['id'];
if(isset($_SESSION['panier'][$id]))
{
   $db=config::getConnexion();
$produits = ("SELECT * FROM produits where id_produit=$id ");
$query=$db->prepare($produits);
 $query->execute();
 
 while($product=$query->fetch())
{
  
   $name=$product['nom_produit'];
$_prix=$product['prix_produit'];
   $_qty=$_SESSION['panier'][$product['id_produit']];
   $db=config::getConnexion();
   $insert_products = ("INSERT INTO  panier (namee,quantite,prix_total) VALUES('$name','$_qty','$_prix')" ); 
   $query=$db->prepare($insert_products);
$query->execute();	
}
}
}





