<?php

    include_once '../../Model/commande.php';
    include_once '../../Model/panier.php';
	include_once '../../Controller/commandeCRUD.php';
	include_once '../../Controller/pannierCRUD.php';
	
	$panierCRUD = new panierCRUD();
	$listepanier=$panierCRUD->Afficherpanier(); 

   
    $error = "";

    $panier = null;

    $paniers = new panierCRUD();

    if (isset($_POST['modifierrr'])) {

       
    
        if (
            isset($_POST['produit']) &&		
            isset($_POST['quantite']) 	
            
            
    
        ) {
            if (
                !empty($_POST['produit']) &&	
                !empty($_POST['quantite']) 	
                
    
            ) {
    
                $panier = new panier(
                    null,
                    $_POST['produit'],
                    $_POST['quantite']
                    
                );
    
                $paniers->Modifierpanier($panier,$_POST['id_panier']);
                header('Location:cart.php');
            }
                  
    }
}
    
   
    
    /*if(isset($_POST['Trie']))
    {  
        $Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
        if ($Trier == "first_name")
        {
            $listecommande = $commandeCRUD->TrieASC();
        }
        else
        {
            $listecommande = $commandeCRUD->TrieDESC();
        }
    }*/
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
              <li class="nav-item active submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                </ul>
							</li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
							</li>
							<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking-order.html">Tracking</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
           
            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><a class="nav-link" href="cart.html"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </a></li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  
  <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">uapdate</h6>
                            <?php
                            if (isset($_POST['id_commande'])){
                                $panier = $pannierCRUD->Recupererpanier($_POST['id_panier']);
                            }
                            ?>
	<div class="commande">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="checkout.php" method="POST" >
                        <div class="col-md-6 form-group p_star">produit
                            <input type="text" class="form-control" id="produit" name="produit" >
                            <span class="placeholder" data-placeholder="produit"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">quantite
                            <input type="text" class="form-control" id="quantite" name="quantite" >
                            <span class="placeholder" data-placeholder="quantite"></span>
                        </div>
                        
                        
                        <div class="col-md-6 form-group p_star">
                        
                   <input type="submit"  class="btn btn-primary" id="Modifier" name="modifierrr" value="Modifier"> 
                                <input type="hidden" name="id_panier" value="<?php echo $panier['id_panier']; ?>" >
                                
</div>

                    </div>
<br></br>
</form>
  <!--================ Start footer Area  =================-->	
  <footer>
		<div class="footer-area footer-only">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets ">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
                          
  
		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
  
</body>

                         
</html>