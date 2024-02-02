<?php
 session_start();

 include_once '../../Model/program.php';
 include_once '../../Model/demande.php';
 include_once '../../Controller/programCRUD.php';
 include_once '../../Controller/demandeCRUD.php';

$demandeCRUD = new demandeCRUD();

$error = "";

 
$demande = null;

    $demandes = new demandeCRUD();
    $programCRUD = new  programCRUD();
	$listecategorietype=$programCRUD->Afficherprogram();

if (isset($_POST['ajout'])) {
if (
    isset($_POST['id_u']) &&	
  isset($_POST['id_demande']) &&	
  isset($_POST['hauteur']) &&	
  isset($_POST['poids']) &&
  isset($_POST['age'])) 

 {
    
  if (
    !empty($_POST['id_u']) && 
    !empty($_POST['id_demande']) && 
    !empty($_POST['hauteur']) &&
    !empty($_POST['poids']) && 
    !empty($_POST['age']))

   {

    $demande = new demande(
        $_POST['id_u'],
      $_POST['id_demande'],
      $_POST['hauteur'], 
      $_POST['poids'],
      $_POST['age']
    );
    
    $demandes->Ajouterdemande($demande);
    header('Location:indexPC.php');
  
  }

  else{
    $error = "Missing information";
  }
 }
}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <link rel="shortcut icon" type="image/x-icon" href="lol.ico">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap1.min.css" type="text/css">
    <link rel="stylesheet" href="css/font1-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
</head>

<body>

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <a href="indexPC.php">Menu</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#"></a>
                                <a href="#"></a>
                            </div>
                            <div class="header__top__hover">
                                <ul>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        
                        
                            <h4>

                            Bienvenue sur notre site dédié à la santé et à la forme physique ! Nous sommes là pour vous aider à vivre votre meilleure vie en adoptant un mode de vie sain. Notre équipe d'experts propose des conseils en matière d'exercices, de nutrition, de santé mentale et de soins personnels pour vous aider à atteindre vos objectifs de fitness et améliorer votre bien-être global. Rejoignez-nous dans ce voyage vers un vous plus sain et plus heureux !</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
            
                    <div style="text-align:center;">
                 <br>
                 <img src="gymshark.jpg" alt="Description of the image" style="border: 2px solid red;">
                </div>
                

        
    
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
            <form method="POST"  action="" onsubmit="return CTRL()">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                          <!--  <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                            here</a> to enter your code</h6>-->
                            <h6 class="checkout__title">DEMANDE</h6>
                            <div class="row">
                            <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>ID utilisateur</p>
                                        <input type="number"  name="id_u" id="id_u"  >
                                        <div id="error_id_u" style="color:red"></div>
                                    </div>
                                  
                                </div>

                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>ID Demande</p>
                                        <select type="range"  name="id_demande" id="id_demande">
                                    <option selected disabled>choisir...</option>
                                                    <?php
                                                        foreach($listecategorietype as $categorie){
                                                    ?>
                                                    <option value="<?php echo $categorie['id_demande']; ?>"><?php echo $categorie['id_demande']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                    </select>
                                        <div id="error_id_demande" style="color:red"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Hauteur</p>
                                        <input type="number"  name="hauteur" id="hauteur"  >
                                        <div id="error_hauteur" style="color:red"></div>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="checkout__input">
                                        <p>Poids</p>
                                        <input type="number"  name="poids" id="poids" placeholder="Enter poids" >
                                        <div id="error_poids" style="color:red"></div>     
                                    </div>
                            <div class="checkout__input">
                                <p>Age</p>
                                <input type="age"  name="age" id="age" placeholder="Enter age" >
                                

                            </div>
                            <div id="error_age" style="color:red"></div>

                            
                            <button  type="submit" class="bnt" name="ajout" value="Ajouter"  >DEMANDER</button>
                            
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--BUTTONS-->
    <div style="text-align:center;">
     <div id="button-container">
      <button class="bnt" id="button1">BATIMENT PRINCIPAL</button>
      <button class="bnt" id="button2">BATIMENT SECONDAIRE</button>
     </div>
    </div>
    <br>


    


    <style>
      p.center {
        text-align: center;
      }
    </style>
    <!-- <center>
      <p class="center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.14235837708!2d10.125270411520704!3d36.815108472127065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3390e951c1df%3A0x9f85266b728bada!2sCalifornia%20GYM%20BARDO!5e0!3m2!1sen!2stn!4v1683146931410!5m2!1sen!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p> 
    </center> -->
        
    <script>
                                function CTRL()
                                {
                                    var test=0;
                                   var letters = /^[A-Za-z]+$/;

                                    var id_demande=document.getElementById("id_demande").value;
                                    var error_id_demande = document.getElementById("error_id_demande");

                                    var poids=document.getElementById("poids").value;
                                    var error_poids = document.getElementById("error_poids");

                                    var hauteur=document.getElementById("hauteur").value;
                                    var error_hauteur = document.getElementById("error_hauteur");

                                    var age=document.getElementById("age").value;
                                    var error_age = document.getElementById("error_age");

                                    
                                    //****id_demande****//
                                    if(id_demande=="")
                                    {
                                        error_id_demande.innerHTML="Il faut saisir le id de demande !";  
                                        test=1;
                                    }
                                        else
                                        { error_id_demande.style.color="green"
                                            error_id_demande.innerHTML="ce champs a ete remplis correctement";
                                          
                                        }
                                    //*****fin id demande****//


                                    //****poids****//
                                    if (poids === "") 
                                        {
                                            error_poids.innerHTML = "Il faut saisir un poids !";  
                                            test = 1;
                                        } else if (poids <= 0 || poids > 300) 
                                        {
                                            error_poids.innerHTML = "Le poids doit être compris entre 0 et 300 kg !";  
                                            test = 1;
                                        } 
                                        else 
                                        {
                                            error_poids.style.color = "green";
                                            error_poids.innerHTML = "Ce champ a été rempli correctement.";
                                        }

                                    //*****fin poids****//

                                    //****hauteur****//
                                        if(hauteur=="")
                                    {
                                        error_hauteur.innerHTML="il faut saisir un hauteur !";  
                                        test=1;
                                    }
                                    else 
                                        if(hauteur<= 0 ||hauteur>350)
                                        {
                                            error_hauteur.innerHTML="Il faut que la hauteur soit entre a 0 et 350 CM !";  
                                            test=1;
                                        }
                                        else 
                                        {
                                            error_hauteur.style.color = "green";
                                            error_hauteur.innerHTML = "Ce champ a été rempli correctement.";
                                        }
                                    //*****fin hauteur****//


                                     //****age****//
                                     if(age=="")
                                    {
                                        error_age.innerHTML="il faut saisir un age !";  
                                        test=1;
                                    }
                                    else 
                                        if(age<= 10 ||age>350)
                                        {
                                            error_age.innerHTML="Il faut que votre age doit etre superieur a 10 ans !";  
                                            test=1;
                                        }
                                        else 
                                        {
                                            error_age.style.color = "green";
                                            error_age.innerHTML = "Ce champ a été rempli correctement.";
                                        }
                                    //*****fin age****//

                                   
                                if(test==1)
                                return false;
                            
                                }
                                </script>




    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
   
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <style>
.bnt
{
  
    display: inline-block;
    border: 0px solid #384aeb;
    border-radius: 15px;
    color: #222;
    font-weight: 700;
    padding: 0px 20px;
    background: #53565a;
    color: #fff;
    transition: all .4s ease;
    

}
.bg-primary {
    background-color: #315a86!important;
}

.bnt:hover {
    border-color: #384aeb;
    background: transparent;
    color: #222
}
.badge {
    color:white;
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out
}


    </style>
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
      


     <div class="container " >     <div id="map" width="600" height="450"></div>
</div>
   <style>
    #map { height: 400px; } 
   </style>
     <script>
        var map = L.map('map').setView([36.7755, 10.2320], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



//hammamet
var lan=36.4073;
var lat=10.6225;

//megrine
var lan_1=36.7716;
var lat_1=10.2768;

document.getElementById("button1").addEventListener("click", function() {
    var marker = L.marker([lan_1, lat_1]).addTo(map).bindPopup('Batiment principal.');
    map.setView([lan_1, lat_1], 16);
    var circle = L.circle([lan_1, lat_1], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 100
    }).addTo(map);

    
  });

 document.getElementById("button2").addEventListener("click", function(){
    var marker = L.marker([lan, lat]).addTo(map).bindPopup('Batiment secondaire.');
    map.setView([lan, lat], 16);
    var circle = L.circle([lan, lat], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 100
    }).addTo(map);
  });
     </script> 
<hr style="border-color: black; border-width: 1px;">
 <!-- Breadcrumb Section Begin -->
 
 <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h6></h6>
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

</body>

</html>