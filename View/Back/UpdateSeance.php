<?php

include_once '../../Model/Seance.php';
include_once '../../Model/Reservation.php';
include_once '../../Controller/SeanceCRUD.php';
include_once '../../Controller/ReservationCRUD.php';
	
	$seanceCRUD = new seanceCRUD();
	$listeseance=$seanceCRUD->Afficherseance(); 

   

    $error = "";

    $seance = null;

    $seances = new seanceCRUD();

    if (isset($_POST['modifierrr'])) {

        $image_seance = $_FILES["image_seance"]["name"];
    
        $tmp_image_seance= $_FILES["image_seance"]["tmp_name"];  
    
        $folder = "../Uploads/".$image_seance;
    
        if (
            isset($_POST['type_seance']) &&		
            isset($_POST['dure_seance']) &&
            isset($_POST['nbr_maximal']) && 
            isset($_POST['categorie']) 
            //&&&
            //&isset($_POST['image_produit']) 
    
        ) {
            if (
                !empty($_POST['type_seance']) &&
                !empty($_POST['dure_seance']) && 
                !empty($_POST['nbr_maximal']) && 
                !empty($_POST['categorie'])
                //&&
                //&!empty($_POST['image_produit'])
    
            ) {
    
                $seance = new seance(
                    null,
                    $_POST['type_seance'],
                    $_POST['dure_seance'], 
                    $_POST['nbr_maximal'],
                    $_POST['categorie'],
                    //$_POST['image_produit']
                    $folder
                );
    
                $seances->Modifierseance($seance,$_POST['id_seance']);
                header('Location:Seance.php');
            }
            else{
                $error = "Missing information";
            }
        move_uploaded_file($tmp_image_seance, $folder);
        }        
    }
    /*
    if(isset($_POST['RechercheNom']))
    {
        $listeproduit = $ProduitCRUD->Rechercher($_POST['RechercheNom']);
    }
    
    if(isset($_POST['Trie']))
    {  
        $Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
        if ($Trier == "Prix croissant")
        {
            $listeproduit = $ProduitCRUD->TriePrixASC();
        }
        else
        {
            $listeproduit = $ProduitCRUD->TriePrixDESC();
        }
    }
    
    */
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
      select {
        width: 520px;
  background-color: #000;
  color: gray;
  border: none;
  padding: 10px;
}

option {
  background-color: #000;
  color: gray;
  border: none;
  padding: 10px;
}

select option[selected] {
  color: #fff;
}
input[type="file"] {
  background-color: #000;
  color: gray;
  border: none;
  padding: 10px;
  width: 520px;
}
   </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


   
                   <!-- Sidebar Start -->
                   <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">JASMINEOUS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="panier.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Panier</a>
                <a href="commande.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Commande</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="Seance.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Seance</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Produit</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Categorie</a>
                    <a href="Reservation.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reservation</a>
                    <a href="evenement.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Event/Rec</a>
                    <a href="programe.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Programme</a>
                    <a href="demande.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>demande</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Gestion Produit</h6>
                            <?php
                            if (isset($_POST['id_seance'])){
                                $seance = $seanceCRUD->Recupererseance($_POST['id_seance']);
                            }
                            ?>
                            <form action=""method="POST" onsubmit="return CTRL()" enctype="multipart/form-data" >
                                <div class="mb-3">
                                    <label for="type_seance">Type_Seance :</label>
                                    <input type="text" class="form-control"  name="type_seance" id="type_seance" placeholder="type de seance" value="<?php echo $seance['type_seance']; ?>" >
                                </div>
                                <div id="error_type_seance" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="dure_seance">Dure_Seance :</label><br>
                                    <input type="number" class="form-control"  name="dure_seance" id="dure_seance" placeholder="dure de seance" value="<?php echo $seance['dure_seance']; ?>" >
                                </div>
                                <div id="error_dure_seance" style="color:red"></div>
                            
                                <div class="mb-3">
                                    <label for="nbr_maximal">Quantité :</label>
                                    <input type="number" class="form-control" name="nbr_maximal" id="nbr_maximal" value="<?php echo $seance['nbr_maximal']; ?>">
                                </div>
                                <div id="error_nbr_maximal" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="categorie">categorie:</label>
                                    <input type="text" class="form-control"  name="categorie" id="categorie" value="<?php echo $seance['categorie']; ?>">
                                </div>
                                <div id="error_prix_produit" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="image_seance">Image :</label>
                                    <input type="file" name="image_seance" id="image_seance" value="<?php echo $seance['image_seance']; ?>" accept=".jpg, .jpeg, .png, .gif">
                                </div>
                                <div id="error_image_seance" style="color:red"></div>
                                <input type="submit"  class="btn btn-primary" id="Modifierrr" name="modifierrr" value="Modifier"> 
                                <input type="hidden" name="id_seance" value="<?php echo $seance['id_seance']; ?>" >
                            </form>
                        </div>
                    </div>
                    <script>
                                function CTRL()
                                {
                                    var test=0;
                                   var letters = /^[A-Za-z]+$/;

                                    var type_seance=document.getElementById("type_seance").value;
                                    var error_type_seance = document.getElementById("error_type_seance");

                                    var dure_seance=document.getElementById("dure_seance").value;
                                    var error_dure_seance = document.getElementById("error_dure_seance");

                                    var nbr_maximal=document.getElementById("nbr_maximal").value;
                                    var error_nbr_maximal = document.getElementById("error_nbr_maximal");

                                    var categorie=document.getElementById("categorie").value;
                                    var error_categorie = document.getElementById("error_categorie");

                                    if(type_seance=="")
                                    {
                                        error_type_seance.innerHTML="Il faut saisir le type de seance !";  
                                        test=1;
                                    }
                                    else 
                                        if(!type_seance.match(letters))
                                        {
                                            error_type_seance.innerHTML="Il faut que le type du seance contient que des lettres !";  
                                            test=1;
                                        }
                                        else
                                        { error_type_seance.style.color="green"
                                            error_type_seance.innerHTML="ce champs a ete remplis correctement";
                                          
                                        }

                                    if(dure_seance=="")
                                    {
                                        error_dure_seance.innerHTML="Il faut mettre le duree du seance !";  
                                        test=1;
                                    }
                                    else 
                                        if(dure_seance<= 0 || dure_seance >=4)
                                        {
                                            error_dure_seance.innerHTML="Il faut que la dure du seance etre compris entre 1 et 4  !";  
                                            test=1;
                                        }
                                        else
                                        {
                                            error_dure_seance.style.color="green"
                                            error_dure_seance.innerHTML="ce champs a ete remplis correctement";
                                        }
                                    
                                    if(nbr_maximal=="")
                                    {
                                        error_nbr_maximal.innerHTML="il faut saisir un nombre maximale pour la seance !";  
                                        test=1;
                                    }
                                    else 
                                        if(nbr_maximal<= 0 ||nbr_maximal>11)
                                        {
                                            error_nbr_maximal.innerHTML="Il faut que le nombre maximal  etre compris entre a 0 et 10 !";  
                                            test=1;
                                        }
                                        else
                                        {
                                            error_nbr_maximal.style.color="green"
                                            error_nbr_maximal.innerHTML="ce champs a ete remplis correctement";
                                        }

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
                                    
                                   
                                if(test==1)
                                return false;
                                }
                                </script>

                    
           
                    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>