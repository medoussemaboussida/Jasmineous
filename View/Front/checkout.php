<?php
include_once '../../model/commande.php';
include_once '../../model/panier.php';
include_once '../../controller/commandeCRUD.php';
include_once '../../controller/pannierCRUD.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once '../../FC/PHPMailer/src/Exception.php';
include_once '../../FC/PHPMailer/src/PHPMailer.php';
include_once '../../FC/PHPMailer/src/SMTP.php';
	session_start();
	$commandeCRUD = new commandeCRUD();
	$listecommande=$commandeCRUD->Affichercommande(); 

  $pannierCRUD = new panierCRUD();
	$listepanier=$pannierCRUD->Afficherpanier();

    $error = "";

    $commande = null;

    $commandes = new commandeCRUD();
    $error = "";

    $panier = null;

    $paniers = new panierCRUD();
  
    
    if (isset($_POST['send'])) {

     
    
        
    if (
      isset($_POST['panier']) &&		
     
      isset($_POST['adda']) &&
      isset($_POST['code_post']) && 
      isset($_POST['f_name']) &&
      isset($_POST['l_name']) &&
      isset($_POST['tel'])
      

  ) {
      if (
          !empty($_POST['panier']) &&	
         
          !empty($_POST['adda']) &&
          !empty($_POST['code_post']) && 
          !empty($_POST['f_name']) &&
          !empty($_POST['l_name']) &&
          !empty($_POST['tel']) 

      ) {
        $db=config::getConnexion();
        $select_products = ("SELECT * FROM panier "); 
        $query=$db->prepare($select_products);
        $query->execute();
        while($panier=$query->fetch())
        {
          $panier_name[]=$panier['namee'].'('.$panier['quantite'].')';
$pay=implode(', ',$panier_name);
        }
      
          $commande = new commande(
           
            $_POST['panier'],
            NULL,
            $pay, 
              $_POST['adda'], 
              $_POST['code_post'],
              $_POST['f_name'],
              $_POST['l_name'],
              $_POST['tel']
             
          );
    
                $commandes->Ajoutercomande($commande);
                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host ='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='mohamedkhaled.tebourbi@esprit.tn';
                $mail->Password='olbqigeedstmmsov';
                $mail->SMTPSecure='ssl';
                $mail->Port=465;
                $mail->setFrom('mohamedkhaled.tebourbi@esprit.tn');
                $mail->addAddress($_POST["panier"]);
                $mail->isHTML(true);
                $mail->Subject="THANK YOU !!";
                $mail->Body="Commande successfully bro !";
                $mail->send();
                header('Location:checkout.php');
                
            }
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
                <li class=""><a href="indexPC.php">Retour</a></li>


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
        <?php echo $_SESSION['user_name'] ?> 
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
      <div class="commande">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form"  action="checkout.php"  method="POST"  onsubmit="return CTRL()" enctype="multipart/form-date">
                        <div class="col-md-6 form-group p_star">first_name
                            <input type="text" class="form-control" id="f_name" name="f_name" >
                            <div id="error_f_name" style="color:red"></div>
                            <span class="placeholder" data-placeholder="f_name"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">last_name
                            <input type="text" class="form-control" id="l_name" name="l_name" >
                            <div id="error_l_name" style="color:red"></div>
                            <span class="placeholder" data-placeholder="l_name"></span>
                        </div>
                        
                        <div class="col-md-6 form-group p_star">Phone number
                            <input type="number" class="form-control" id="tel" name="tel" >
                            <div id="error_tel" style="color:red"></div>
                            <span class="placeholder" data-placeholder="tel"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">address
                          <input type="text" class="form-control" id="adda" name="adda" >
                          <div id="error_adda" style="color:red"></div>
                          <span class="placeholder" data-placeholder="adda"></span>
                      </div>
                      <div class="col-md-6 form-group p_star">Postcode/ZIP
                        <input type="text" class="form-control" id="code_post" name="code_post" >
                        <div id="error_code_post" style="color:red"></div>
                        <span class="placeholder" data-placeholder="code_post"></span>
</div>

                        <div class="col-md-6 form-group p_star">mail 
                            <input type="email" class="form-control" id="panier" name="panier" >
                            <div id="error_nom_produit" style="color:red"></div>
                            <span class="placeholder" data-placeholder="panier"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="hidden" class="form-control" id="pay" name="pay" >
                            <div id="error_nom_produit" style="color:red"></div>
                            <span class="placeholder" data-placeholder="pay"></span>
                        </div>
                        
                        <button type="submit" class="btn btn-appoint" name="send" value="send">Ajouter</button>     
                        

 
<br></br>

                                

                     
                        
                    </form>
                    <script>
                                function CTRL()
                                {
                                    var f_name=document.getElementById("f_name").value;
                                    var error_f_name = document.getElementById("error_f_name");

                                    var l_name=document.getElementById("l_name").value;
                                    var error_l_name = document.getElementById("error_l_name");

                                    var adda=document.getElementById("adda").value;
                                    var error_adda = document.getElementById("error_adda");

                                    var code_post=document.getElementById("code_post").value;
                                    var error_code_post = document.getElementById("error_code_post");

                                    var tel=document.getElementById("tel").value;
                                    var error_tel = document.getElementById("error_tel");

                                    if(f_name=="")
                                    {
                                        error_f_name.innerHTML="Il faut saisie un nom pour le produit !";  
                                        return false;
                                    }
                                    else
                                        { error_f_name.style.color="green"
                                            error_f_name.innerHTML="ce champs a ete remplis correctement";
                                          
                                        }
                                        if(f_name.charAt(0)>="a" && f_name.charAt(0)<="z")
                                        {
                                            error_f_name.innerHTML="Il faut que le nom du produit commencé par une lettre majuscule !";  
                                            return false;
                                        }
                                        
                                        
                                          else 
                                        {
                                          error_f_name.style.color="green"
                                            error_f_name.innerHTML="ce champs a ete remplis correctement";
                                        }  
                                        
                                        if(l_name=="")
                                    {
                                        error_l_name.innerHTML="Il faut saisie un nom pour le produit !";  
                                        return false;
                                    }
                                    else
                                        { error_l_name.style.color="green"
                                            error_l_name.innerHTML="ce champs a ete remplis correctement";
                                          
                                        }
                                        if(l_name.charAt(0)>="a" && l_name.charAt(0)<="z")
                                        {
                                            error_l_name.innerHTML="Il faut que le nom du produit commencé par une lettre majuscule !";  
                                            return false;
                                        }
                                        else
                                        {
                                          else 
                                        {
                                          error_l_name.style.color="green"
                                            error_l_name.innerHTML="ce champs a ete remplis correctement";
                                        }  

                                    if(adda=="")
                                    {
                                        error_adda.innerHTML="Il faut mettre le quantite de ce produit !";  
                                        return false;
                                    }
                                    
                                        else
                                        {
                                          error_adda.style.color="green"
                                            error_adda.innerHTML="ce champs a ete remplis correctement";
                                        }
                                    
                                    if(code_post=="")
                                    {
                                        error_code_post.innerHTML="Il faut mettre le prix de ce produit !";  
                                        return false;
                                    }
                                    
                                        else
                                        {
                                          error_code_post.style.color="green"
                                            error_code_post.innerHTML="ce champs a ete remplis correctement";  
                                        }

                                    if(tel=="")
                                    {
                                        error_tel.innerHTML="Il faut mettre une image produit pour ce produit !";  
                                        return false;
                                    }
                                    else 
                                        if(tel.maxlength >=8 )
                                        {
                                            error_tel.innerHTML="Il faut que le nom du produit commencé par une lettre majuscule !";  
                                            return false;
                                        }
                                    else 
                                        {
                                          error_tel.style.color="green"
                                            error_tel.innerHTML="ce champs a ete remplis correctement";  
                                        }
                                }
                              }
                                </script>
                </div>
               <br><br><br><br>

                <div class="col-lg-4">
                    <div class="order_box">
                    <h2>Votre commande</h2><br>
    <table>
      <thead>
        <tr>
          <th>Produit</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        $qt = 0;

        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {

        } else {
          $db = config::getConnexion();
          $produits = ("SELECT * FROM produits WHERE id_produit IN (" . implode(',', $ids) . ")");
          $query = $db->prepare($produits);
          $query->execute();
          foreach ($query as $product) :
            $total = $total + $product['prix_produit'] * $_SESSION['panier'][$product['id_produit']];
            $qt = $qt + $_SESSION['panier'][$product['id_produit']];
        ?>
            <tr>
              <td><?= $product['nom_produit'] ?></td>
              <td><?= $product['prix_produit'] ?> DT</td>
            </tr>
        <?php endforeach;
        } ?>
      </tbody>
    </table>
    <div class="total">
      Total: <span><?= $total ?> DT</span>
    </div>
  </div>
    </div>
    </div>
    <style>
       .col-lg-4 {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
}

.order_box {
  border: 1px solid #ccc;
  padding: 20px;
  background-color: #999; /* Couleur de fond grise */
  color: #000; /* Couleur de texte blanc */
  width: 350px; /* Largeur du conteneur */
}

.order_box h2 {
  font-weight: bold;
}

.order_box ul.list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.order_box ul.list li {
  margin-bottom: 10px;
}

.order_box ul.list li a {
  display: flex;
  align-items: center;
  color: #000; /* Couleur de texte blanc */
}

.order_box ul.list li a h4 {
  margin: 0;
  font-weight: bold;
}

.order_box ul.list li a h4 span {
  margin-left: auto;
}

.order_box ul.list.list_2 {
  margin-top: 20px;
}

.order_box ul.list.list_2 li {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.order_box ul.list.list_2 li span {
  font-weight: bold;
}
 
    </style>
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
