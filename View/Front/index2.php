<?php
 session_start();

 include_once '../../Model/Seance.php';
 include_once '../../Model/Reservation.php';
 include_once '../../Controller/SeanceCRUD.php';
 include_once '../../Controller/ReservationCRUD.php';

$reservationCRUD = new reservationCRUD();
$seanceCRUD = new seanceCRUD();
$listeseance=$seanceCRUD->Afficherseance();
$error = "";
 
$reservation = null;

 $seance=null;


    
 if(isset($_POST['captcha'])){

    echo$_SESSION['code_confirmation'];
    echo $_POST['captcha'];
     if($_POST['captcha'] === $_SESSION['code_confirmation']){
  
          $message ='<p class="text-success" id="msg">Message Submitted Successfully</p>';
         
     }
    else
    {?>
    <script>
        $('#verify_captcha').addClass("btn btn-danger").text("Not Matched");
        $("#captcha_id").prop('disabled', true);
        setTimeout(
          function() 
            {    //disable 
                $('#captcha_id').val("");
                $("#captcha_id").prop('disabled', false);
                $('#verify_captcha').removeClass("btn btn-danger").text("Verify Captcha");
            }, 5000);
            </script>
            <?php
    }
 }
 
 

 if (isset($_POST['id_seance'])) {
  $seance = $seanceCRUD->recupererseance($_POST['id_seance']);
}



	


/*
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
	 */  
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

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
    
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="indexPC.php">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Reservation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
            <form method="POST"  action="BLANK1.php" onsubmit="return CTRL()">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Formulaire</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p> Reservation-Form<span>*</span></p>
                                        <input readonly type="text"  name="type_reservation" id="type_reservation"  value="<?php echo $seance['type_seance']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>ID_Seance<span>*</span></p>
                                        <input readonly type="text"  name="id_seance" id="id_seance"  value="<?php echo $seance['id_seance']; ?>">
                                       
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="checkout__input">
                                        <p>Usernamee<span>*</span></p>
                                        <input type="text"  name="username" id="username" placeholder="Enter username" >
                                        <div id="error_username" style="color:red"></div>     
                                    </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email"  name="email" id="email" placeholder="Enter email" >

                            </div>
                            <div id="error_email" style="color:red"></div>
                            <div class="checkout__input">
                                <p>Reservation-Date<span>*</span></p>
                                <input type="date"  name="date_reservation" id="date_reservation" placeholder="Date_reservation">
                               
                            </div>
                            <div id="error_date_reservation" style="color:red"></div>
                            <div class="checkout__input">
                                <p>Phone-Number<span>*</span></p>
                                <input type="number"  name="phone" id="phone" placeholder="Enter phone number" >
                            </div>
                            <div id="error_phone" style="color:red"></div>
                            <div class="checkout__input">
                               
                            </div>
                           

   
    <div class="checkout__input">
           <input type="text" name="captcha" style="width:30%" id="captcha" class="form-control" value=""  placeholder="Enter Captcha">
           </div>
           <button type="submit" id="verify_captcha" class="btn btn-primary ml-3 ">Captcha</button>
          
  
       <p id="show" style="text-align:center;"><?php  if(isset($message)){
              echo $message;
              }session_unset();?></p>
                
                            <div class="checkout__input">
                              
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            </div>
                            <div class="checkout__input">
                               
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                            <img src="<?php echo $seance['image_seance'];?>" class="img-thumbnail rounded-pill" >
    <h5 class="card-title text-center " style="max-width: 4000px; margin :20p0x 100px;"> seance <?php echo $seance['type_seance'];?></h5>
    <div class="features">
    <h6 class="mb-1">Features</h6>
    <span class= "badge bg-primary">duree: <?php echo $seance['dure_seance'];?> hours</span>
    <span class= "badge bg-primary">categorie: <?php echo $seance['categorie'];?> </span>
    <span class= "badge bg-primary">nb_maximal: <?php echo $seance['nbr_maximal'];?> </span>
    </div>
    <div class="rating mb-4">
    <br>
<h6 class ="mb-1">Rating: </h6>
<m class="bi bi-star-fill text-warning" ></m>
<m class="bi bi-star-fill text-warning" >&#9733;</m>
<m class="bi bi-star-fill text-warning" >&#9733;</m>
<m class="bi bi-star-fill text-warning" >&#9733;</m>
<m class="bi bi-star-fill text-warning" >&#9733;</m>


   </div>
                                <p>Avoir une routine, limiter le temps d'écran, pratiquer une activité physique quotidienne. Gardez une routine régulière et restez en contact avec vos proches.</p>
                                <div class="checkout__input__checkbox checked">
                                    <label for="payment">
                                        efficacite
                                        <input type="checkbox" id="payment" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        confiance
                                        <input type="checkbox" id="paypal" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                               
                               <a href="BLANK1.php"></a><button type="submit" class="bnt" >RESERVER TOUT DE SUITE</button></a>
                               
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script>
                                function CTRL()
                                {
                                    var test=0;
                                   var letters = /^[A-Za-z]+$/;

                                    var username=document.getElementById("username").value;
                                    var error_username = document.getElementById("error_username");

                                    var email=document.getElementById("email").value;
                                    var error_email = document.getElementById("error_email");

                                    var date_reservation=document.getElementById("date_reservation").value;
                                    var error_nbr_maximal = document.getElementById("error_nbr_maximal");

                                    var phone=document.getElementById("phone").value;
                                    var error_phone = document.getElementById("error_phone");

                                    if(username=="")
                                    {
                                        error_username.innerHTML="Il faut saisir le username !";  
                                        test=1;
                                    }
                                    else 
                                        if(!username.match(letters))
                                        {
                                            error_username.innerHTML="Il faut que le username contient que des lettres !";  
                                            test=1;
                                        }
                                        else
                                        { error_username.style.color="green"
                                            error_username.innerHTML="ce champs a ete remplis correctement";
                                          
                                        }

                                    if(email=="")
                                    {
                                        error_email.innerHTML="Il faut mettre votre email !";  
                                        test=1;
                                    }
                                    /*else 
                                        if(email<= 0 || eamol >=4)
                                        {
                                            error_dure_seance.innerHTML="Il faut que la dure du seance etre compris entre 1 et 4  !";  
                                            test=1;
                                        }*/
                                        else
                                        {
                                            error_email.style.color="green"
                                            error_email.innerHTML="ce champs a ete remplis correctement";
                                        }
                                 
                                    if(date_reservation=="")
                                    {
                                        error_date_reservation.innerHTML="il faut saisir une date !";  
                                        test=1;
                                    }
                                   /* else 
                                        if(nbr_maximal<= 0 ||nbr_maximal>11)
                                        {
                                            error_nbr_maximal.innerHTML="Il faut que le nombre maximal  etre compris entre a 0 et 10 !";  
                                            test=1;
                                        }*/
                                        else
                                        {
                                            error_date_reservation.style.color="green"
                                            error_date_reservation.innerHTML="ce champs a ete remplis correctement";
                                        }
                                        if(phone=="")
                                    {
                                        error_phone.innerHTML="il faut saisir votre numero !";  
                                        test=1;
                                    }
                                   /* else 
                                        if(nbr_maximal<= 0 ||nbr_maximal>11)
                                        {
                                            error_nbr_maximal.innerHTML="Il faut que le nombre maximal  etre compris entre a 0 et 10 !";  
                                            test=1;
                                        }*/
                                        else
                                        {
                                            error_phone.style.color="green"
                                            error_phone.innerHTML="ce champs a ete remplis correctement";
                                        }
/*
                                    if(image_seance=="")
                                    {
                                        error_image_seance.innerHTML="Il faut mettre une image  pour la seance !";  
                                        test=1;
                                    }
                                    else 
                                        {
                                          
                                            error_image_seance.style.color="green"
                                            error_image_seance.innerHTML="ce champs a ete remplis correctement";
                                        }
                                    
                                 */  
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
    border: 1px solid #384aeb;
    border-radius: 30px;
    color: #222;
    font-weight: 500;
    padding: 10px 30px;
    background: #384aeb;
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
   
</body>

</html>