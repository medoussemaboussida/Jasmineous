<?php

session_start();
include_once '../../config.php';
   if(isset($_GET['del']))  
   {
    $id_del=$_GET['del'];
    unset($_SESSION['panier'][$id_del]);

    
			
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
                <li class=""><a href="#testimonial">Coaching</a></li>
                <li class=""><a href="#contact">Reclamation</a></li>
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
      <h1 class="white">Votre panier <span> 
        <?php echo $_SESSION['user_name'] ?> 
      </span> </h1>
      
   </div>

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
<!--================Cart Area =================-->
<section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
              
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col"> </th>
                              <th scope="col">Produit</th>
                              <th scope="col">Prix</th>
                              <th scope="col">Quantite</th>

                          </tr>
                      </thead>
                      <tbody>
                     <?php 
                     $total= 0 ;
$ids=array_keys($_SESSION['panier']);

if(empty($ids))
{
  echo "Votre panier est vide";
}
else
{
  $db=config::getConnexion();
$produits = ("SELECT * FROM produits WHERE id_produit IN (".implode(',',$ids).")"); 
$query=$db->prepare($produits);
$query->execute();	
	foreach($query as $product):
$total=$total+$product['prix_produit'] * $_SESSION['panier'][$product['id_produit']] ;
                     ?>
                          <tr>
                          <style>
  .service-image {
    width: 200px;
    height: 200px;
  }
  </style>
                              <td>
                                  
                                      <div class="d-flex">
                                      <img src="<?php echo $product['image_produit'];?>" class="img-fluid rounded service-image" alt="author image">
                                      </div>
  </td>
  <td>
                                      <div class="">
                                        
                                      <?= $product['nom_produit']?>
                                      </div>
                                 
                              </td>
                              <td>
                              <input type="text" name="price" id="sst" maxlength="12" value=" <?= $product['prix_produit']?>DT" title="prix"
                                          class="input-text qty">
                                        
                             
                                        </div>
                                  <h5> </h5>
                              </td>
                              
                              <td>
                                  <div class="product_count">
                                      <input type="text" name="qty" id="sst" maxlength="12" value="<?=$_SESSION['panier'][$product['id_produit']] ?>" title="Quantity:"
                                          class="input-text qty">
                                      
                                  </div>
                              </td>
                              <td>
                    <a href="cart.php?del=<?= $product['id_produit']?>"><button class="btn btn-primary">Supprimer</button></a></a><center>    
                </td>
                          </tr>
                          
                          <?php  endforeach; } ?>
                        
                          <tr class="bottom_button">
                              
                              <td>

                              </td>
                              <td>

                              </td>
                              
                          </tr>
                          <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>total</h5>
                              </td>
                              <td>
                                  <h5><?=$total ?>DT</h5>
                              </td>
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                             
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a  class="btn btn-primary" href="indexPC.php">Continuer</a>
                                      <a  class="btn btn-primary" href="checkout.php">Confirmer votre commande</a>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section> 
  <!--/ contact-->
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
              <p>Praesent convallis tortor et enim laoreet, vel consectetur purus latoque penatibus et dis parturient.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Quick Links</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Home</a></li>
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
