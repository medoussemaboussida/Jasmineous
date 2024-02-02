<?php

include_once '../../Model/Produit.php';
include_once '../../Model/Categorie.php';
include_once '../../Controller/ProduitCRUD.php';
include_once '../../Controller/CategorieCRUD.php';
include_once '../../Model/Seance.php';
include_once '../../Model/Reservation.php';
include_once '../../Controller/SeanceCRUD.php';
include_once '../../Controller/ReservationCRUD.php';
include_once '../../Controller/evenementController.php';

session_start();
require("ban.php");
check_if_banned();

//nourrrrrrrr
$evenementController = new evenementController();
$events = $evenementController->getAllEvenet();
$eventTable = "";
foreach($events as $event) {
    $eventTable .= $event->formatRoww();
}
//produit ousemaaaaaaaaaaaaaaaaaaaaa
$ProduitCRUD = new ProduitCRUD();
$listeproduit=$ProduitCRUD->AfficherProduit();
$listeproduit1 = $ProduitCRUD->AfficherProduit();
$listeproduit2 = $ProduitCRUD->AfficherProduit();

$CategorieCRUD = new CategorieCRUD();
$listecategorietype=$CategorieCRUD->AfficherCategorie();

$error = "";

$Produit = null;

$Produits = new ProduitCRUD();

	if (
		isset($_POST['nom_produit']) &&		
		isset($_POST['categorie_produit']) &&
		isset($_POST['quantite_produit']) && 
		isset($_POST['prix_produit']) 
		&&
		isset($_POST['image_produit']) 

	) {
		if (
			!empty($_POST['nom_produit']) &&
			!empty($_POST['categorie_produit']) && 
			!empty($_POST['quantite_produit']) && 
			!empty($_POST['prix_produit'])
			&&
			!empty($_POST['image_produit'])

		) {

			$Produit = new Produit(
				null,
				$_POST['nom_produit'],
				$_POST['categorie_produit'], 
				$_POST['quantite_produit'],
				$_POST['prix_produit'],
				$_POST['image_produit']
			);

			$Produits->AjouterProduit($Produit);
			header('Location:AjouterProduit.php');
		}
		else{
			$error = "Missing information";
		}
}

if(isset($_POST['Trie']))
{  
	$Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
	if ($Trier == "Prix croissant")
	{
		$listeproduit1 = $ProduitCRUD->TriePrixASC();
	}
	else
	{
		$listeproduit1 = $ProduitCRUD->TriePrixDESC();
	}
}
else{
	$error = "Missing information";
}
	  
//seance fathiiiiiiiiiiiiiiiiii

$seanceCRUD = new seanceCRUD();
$listeseance=$seanceCRUD->Afficherseance();
$listeseance1 = $seanceCRUD->Afficherseance();
$listeseance2 = $seanceCRUD->Afficherseance();



$error = "";

$seance = null;

$seances = new seanceCRUD();

	if (
		isset($_POST['type_seance']) &&		
		isset($_POST['dure_seance']) &&
		isset($_POST['nbr_maximal']) && 
		isset($_POST['categorie']) 
		&&
		isset($_POST['image_seance']) 

	) {
		if (
			!empty($_POST['type_seance']) &&
			!empty($_POST['dure_seance']) && 
			!empty($_POST['nbr_maximal']) && 
			!empty($_POST['categorie'])
			&&
			!empty($_POST['image_seance'])

		) {

			$seance = new seance(
				null,
				$_POST['type_seance'],
				$_POST['dure_seance'], 
				$_POST['nbr_maximal'],
				$_POST['nbr_maximal'],
				$_POST['categorie']
			);

			$seances->Ajouterseance($seance);
			header('Location:AjouterProduit.php');
		}
		else{
			$error = "Missing information";
		}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medilab Free Bootstrap HTML5 Template</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<style>
.logo {
  transform: scale(2); /* Augmente la taille du logo à deux fois sa taille d'origine */
  
}
.logos {
  transform: scale(0.8); /* Augmente la taille du logo à deux fois sa taille d'origine */
  
}
</style>  
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/jas.png" class="img-responsive logo" style="width: 120px;margin-top: -2px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#banner">Home</a></li>
                <li class=""><a href="#service">Produits</a></li>
                <li class=""><a href="#about">Seances</a></li>
                <li class=""><a href="#doctor-team">Equipe</a></li>
                <li class=""><a href="#contact">Reclamation</a></li>
                <li class=""><a href="fitness.php">Coaching</a></li>
                <li class=""><a href="cart.php">Panier</a></li>

              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="img/jas.png" class="img-responsive logos">
            </div>
            <div class="banner-text text-center">
              <h1 class="white"><br></h1>
              <div class="content">
      <h1 class="white">Bienvenue<span> 
        <?php 
        echo " a Vous" ?> 
      </span> </h1>
      
   </div>
              <p>Jasmineous est une application web qui pourrait offrir une variété des activités guidées et des exercices<br>pour aider les utilisateurs à gérer le stress, l'anxiété et d'autres problèmes .</p>
              <a href="#contact" class="btn btn-appoint">Contactez-nous</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--produit oussemaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
  <section id="service" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="ser-title">Nos produits</h2>
        <hr class="botm-line">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				<br>
				<button type="submit" class="btn btn-appoint" for="Trie" >Trier par :</button>
				<select type="range" name="Trie" id="Trie" class="btn btn-appoint">
					<option selected disabled>choisir...</option>
						<option>Prix croissant</option>
						<option>Prix décroissant</option>
				</select>
			</form>    

        <div class="scrolling-wrapper1">
          <?php foreach($listeproduit1 as $produit): ?>
          <div class="message">
            <img src="<?php echo $produit['image_produit'];?>" class="img-fluid rounded service-image" alt="author image">
            <div class="description">
            <a class="author-book-title" onclick="document.getElementById('modal_<?php echo $produit['id_produit']; ?>').style.display='block'">
                <strong> </strong> <?php echo $produit['nom_produit']; ?>
              </a>
              <h6 style="font-size: 1em;">
                <?php echo $produit['prix_produit']; ?> DT
              </h6>
              <a href="ajouter.php?id=<?php echo $produit['id_produit'];?>"><button type="button"  class="btn btn-seondary"  title="add to cart" ><i class="fa fa-shopping-cart"></i></button>
            </div>
            <div class="category">
      <?php echo $produit['nom_cat']; ?>
    </div>
    <!-- Fenêtre modale pour afficher l'image en grand -->
    <div id="modal_<?php echo $produit['id_produit']; ?>" class="modal" onclick="document.getElementById('modal_<?php echo $produit['id_produit']; ?>').style.display='none'">
      <span class="close">&times;</span>
      <img class="modal-content" src="<?php echo $produit['image_produit'];?>" alt="author image">
    </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- css de produit oussemaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<style>
  .service-image {
    width: 350px;
    height: 350px;
  }

  .description {
    margin-top: 10px;
    text-align: center;
    font-size: 20px;
  }

  .scrolling-wrapper1 {
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .message {
    display: inline-block;
    margin-right: 20px;
    vertical-align: top;
  }

.message {
  position: relative;
}

.message:hover .category {
  display: block;
}

.message:hover img {
  filter: brightness(0.5) opacity(1.1);
}


.category {
  display: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 5px;
  font-weight: bold;
}


  /* Style pour l'image affichée en grand */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Style pour le bouton de fermeture de la fenêtre modale */
  .close {
    color: #fff;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }
</style>

  <!--css de seance fathi-->
  <style>
      .heading
  {
text-align:center;
font-size:4rem;
color:#333;
padding:1rem;
margin:2rem 0;
background:rgba(255,51,153,.05);


  }
  .heading span{
color: #e84393;



  }
  .service-image .img {
    width: 350px;
    height: 350px;
  }
  .card-title
  {
font-size:20px;


  }
.img
{

width:100%;

}
  .description {
    margin-top: 10px;
    text-align: center;
    font-size: 20px;
  }

  .scrolling-wrapper {
    display:flex;
    flex-wrap:wrap;
    gap:1.5rem;
    /*justify-content:center;
    align-items :center;
    flex-wrap:wrap;
    margin : 20px;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    padding: 20px 20px 20px 20px;
    padding-bottom: 20px;
    box-shadow:0.5rem 1.5rem rgba(0,0,0,.1);
border-radius:.5rem;
border:.1rem solid (0,0,0,.1);
position:relative;*/
  
  }

  .message {
    display: inline-block;
    margin-right: 20px;
    vertical-align: top;
  }
  .btn-primary50
  {

background-color: green;
color:white;


  }
  .mb-1
  {
color:black;



  }
  .btn-primary54
  {

background-color: blue;
color:white;
margin-top: 5px ;

size:10px;

  }
  .cards 
  {
    box-shadow:2px 2px 10px;
border-radius:.5rem;
border:.1rem solid (0,0,0,0.1);
position:relative;
  
flex: 1 1 30%;

  }
.cards:hover
{

transform:scale(1.1);
transition :0.3s all;


}
  </style>


  <!--seance fathiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii-->
  <section id="about" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="cont">
      <h2 class="ser-title">Nos seances</h2>
        <hr class="botm-line">
        <div class="scrolling-wrapper">
        <?php foreach($listeseance1 as $seance): ?>
            <div class="cards" style="max-width: 400px; margin :20px 10px;">
 
  <div class="card-body">
  <img src="<?php echo $seance['image_seance'];?>" class="img" >
  <div class="overlay">
<button type="button"  class="btn btn-secondary"  title="quick shop"><i class="fa fa-eye"></i></button>
<button type="button"  class="btn btn-seondary"  title="add to wishlist"><i class="fa fa-heart-o"></i></button>
<button type="button"  class="btn btn-seondary"  title="add to cart"><i class="fa fa-shopping-cart"></i></button>


  </div>
  <h5 class="card-title text-center" style="font-family:Oswald; font-size:25px;"> seance <?php echo $seance['type_seance'];?></h5>
  <br>
   <div class="rating mb-4">
    
<h6 class =" product text-center">Rating: </h6>
<div class=" product1 text-center">
<i class="fa fa-star" ></i>
<i class="fa fa-star" ></i>
<i class="fa fa-star" ></i>
<i class="fa fa-star" ></i>
<i class="fa fa-star" ></i>
</div>


   </div>
   <div class ="d-flex  justify-content-evenly mb-2" >
  <br>
  <form method="POST" action="index2.php" >
  <a type="submit" name="id_seance" ><button class="btn btn-primary50">Reserver Maintenant</button></a>                                               
  <input type="hidden" value=<?PHP echo $seance['id_seance']; ?> name="id_seance">
    </form>
    <a href="#" class="btn  btn-primary54 ">Plus De Detailles</a>
  </div>
  </div>
</div>          
          <?php endforeach; ?>
        </div>
      </div>
      
      </div>

    </div>
    </div>
</section>
  <!--/ about-->
  <!--team-->
  <section id="doctor-team" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Notre équipe</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="img/oussema.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Boussida Oussema</h3>
              <p>Responsable produit</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/oussema.boussida.3"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="img/fathi.jpeg" alt="..." class="team-img">
            <div class="caption">
              <h3>Maddeh Fathi</h3>
              <p>Responsable des réservations</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/fathi.maddeh.9"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="img/tag.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Boughdiri Ahmed</h3>
              <p>Coach de vie</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/profile.php?id=100011126403385"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="img/nour.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Amara Nour</h3>
              <p>Chargée de réclamation</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/nouur.amara.9"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
           <img src="img/khaloud.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Tebourbi Khaled</h3>
              <p>Responsable des commandes</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/khaled.tebourbi1919"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="img/skander.jpg" alt="..." class="team-img">
            <div class="caption">
              <h3>Landolsi Skander</h3>
              <p>Administrateur des comptes</p>
              <ul class="list-inline">
                <li><a href="https://www.facebook.com/SkanderLandolsi07"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
    
  </section>
  <style>
    .team-scroll {
  width: 100%;
  overflow-x: auto;
  white-space: nowrap;
}

.team-row {
  display: inline-block;
  margin-right: 15px;
  vertical-align: top;
}
  </style>
  
  <!--/ doctor team-->
  <!--testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">see what patients are saying?</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ testimonial-->
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
        </div>
        <div class="col-md-4 col-sm-5">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
          <p class="text-right text-primary"><i>— Medilap Healthcare</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--contact-->
  <section id="contact" class="section-padding" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="ser-title">NOS EVENEMENTS</h2>
        <hr class="botm-line">
        <bouton class="btn btn-appoint"> <a onclick="window.print()" >Imprimer </a> </bouton>
                <div class="card-body">
                <br>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
       
            <th> Titre </th>
            <th> Image </th>
            <th> Date  </th>
        </tr>
    </thead>
    <tbody id="tableBody">
            <?php echo $eventTable;?>
    </tbody>
</table>
        
      </div>
    </div>
  </div>
</section>
  <!--/ reclamation et evenement-->
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">About Us</h4>
            </div>
            <div class="info-sec">
              <p>Jasmineous est une application web qui pourrait offrir une variété des activités guidées et des exercices
pour aider les utilisateurs à gérer le stress, l'anxiété et d'autres problèmes .</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Quick Links</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="indexPC.php"><i class="fa fa-circle"></i>Home</a></li>
                <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Appointment</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Follow us</h4>
            </div>
            <div class="info-sec">
              <ul class="social-icon">
                <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
                <li class="bgred"><i class="fa fa-google-plus"></i></li>
                <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
                <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Medilab Theme. All Rights Reserved
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
