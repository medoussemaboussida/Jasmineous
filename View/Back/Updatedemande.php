<?php

include_once '../../Model/program.php';
include_once '../../Model/demande.php';
include_once '../../Controller/programCRUD.php';
include_once '../../Controller/demandeCRUD.php';

    $demandeCRUD = new demandeCRUD();

	$listedemande=$demandeCRUD->Afficherdemande(); 

    $error = "";

    $demande;

    $demandes = new demandeCRUD();
    if (isset($_POST['modifierrr'])) {
    if (
        isset($_POST['id_demande']) &&
        isset($_POST['poids']) &&	
        isset($_POST['hauteur']) &&		
        isset($_POST['age'])  
        
    ) {
        if (
            !empty($_POST['id_demande']) &&
            !empty($_POST['poids']) && 
            !empty($_POST['hauteur']) &&
			!empty($_POST['age'])  

        ) {
            $demande = new demande(
				null,
				$_POST['id_demande'],
                $_POST['poids'],
				$_POST['hauteur'], 
				$_POST['age']
			);

            $demandes->Modifierdemande($demande,$_POST['id_u']);
            header('Location:demande.php');
        }
        else
            $error = "Missing information";
    } 
}
  /*
    if(isset($_POST['TrieCat']))
    {  
        $Trier = filter_input(INPUT_POST, 'TrieCat', FILTER_SANITIZE_STRING);
        if ($Trier == "ordre alphabetique croissant")
        {
            $listecategorie = $CategorieCRUD->TrierNomCatASC();
        }
        else
        {
            $listecategorie = $CategorieCRUD->TrierNomCatDESC();
        }
    }*/
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
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       

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
                <a href="commande.php" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Commande</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="Seance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Seance</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Produit</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Categorie</a>
                    <a href="Reservation.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reservation</a>
                    <a href="evenement.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Event/Rec</a>
                    <a href="programe.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Programme</a>
                    <a href="demande.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>demande</a>

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
                            <h6 class="mb-4">Modifier Demnade</h6>
                            <?php
                            if (isset($_POST['id_u'])){
                                $demande = $demandeCRUD->Recupererdemande($_POST['id_u']);
                            }
                            else
                        echo"egggee"
                            ?>
                            <form action=""method="POST" onsubmit="return CTRL()" enctype="multipart/form-data" >
                            <div class="mb-3">
                                    <label for="id_demande">id_demande :</label>
                                    <input  readonly type="number" class="form-control"  name="id_demande" id="id_demande" placeholder="id_demande" value="<?php echo $demande['id_demande']; ?>" >
                                </div>
                                <div id="error_id_demande" style="color:red"></div>

                                <div class="mb-3">
                                    <label for="poids">poids :</label><br>
                                    <input type="number" class="form-control"  name="poids" id="poids" placeholder="poids" value="<?php echo $demande['poids']; ?>" >
                                </div>
                                <div id="error_poids" style="color:red"></div>
                            
                                <div class="mb-3">
                                    <label for="hauteur">hauteur :</label>
                                    <input type="number" class="form-control" name="hauteur" id="hauteur" value="<?php echo $demande['hauteur']; ?>">
                                </div>
                                <div id="error_hauteur" style="color:red"></div>

                                <div class="mb-3">
                                    <label for="age">age:</label>
                                    <input type="number" class="form-control"  name="age" id="age" value="<?php echo $demande['age']; ?>">
                                </div>
                                <div id="error_age" style="color:red"></div>
                                

                                <input type="submit"  class="btn btn-primary" id="Modifier" name="modifierrr" value="Modifier"> 
                                <input type="hidden" name="id_demande" value="<?php echo $demande['id_demande']; ?>" >
                            </form>
                        </div>
                    </div>
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