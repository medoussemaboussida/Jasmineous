<?php

include_once '../../model/commande.php';
include_once '../../model/panier.php';
include_once '../../controller/commandeCRUD.php';
include_once '../../controller/pannierCRUD.php';

$commandeCRUD = new commandeCRUD();
$listecommande=$commandeCRUD->Affichercommande(); 

//$CategorieCRUD = new CategorieCRUD();
//$listecategorietype=$CategorieCRUD->AfficherCategorie();

$error = "";

$commande = null;

$commandes = new commandeCRUD();

if (isset($_POST['modifierrr'])) {

   

    if (
        isset($_POST['panier']) &&		
        isset($_POST['pay']) &&		
        isset($_POST['add']) &&
        isset($_POST['code_post']) && 
        isset($_POST['f_name']) &&
        isset($_POST['l_name']) &&
        isset($_POST['tel'])
        

    ) {
        if (
            !empty($_POST['panier']) &&	
            !empty($_POST['pay']) &&	
            !empty($_POST['add']) &&
            !empty($_POST['code_post']) && 
            !empty($_POST['f_name']) &&
            !empty($_POST['l_name']) &&
            !empty($_POST['tel']) 

        ) {

            $commande = new commande(
                $_POST['panier'],
                null,
                $_POST['pay'],
                $_POST['add'], 
                $_POST['code_post'],
                $_POST['f_name'],
                $_POST['l_name'],
                $_POST['tel']
               
            );

            $commandes->Modifiercommande($commande,1);
            header('Location:commande.php');
        }
              
}
}



if(isset($_POST['Trie']))
{  
    $Trier = filter_input(INPUT_POST, 'Trie', FILTER_SANITIZE_STRING);
    if ($Trier == "ordre alphabetique croissant")
    {
        $listecommande = $commandeCRUD->TrieASC();
    }
    else
    {
        $listecommande = $commandeCRUD->TrieDESC();
    }
}

if(isset($_POST['RechercheNom']))
    {
        $listecommande = $commandeCRUD->Rechercher($_POST['RechercheNom']);
    }
    else{
        $error = "Missing information";
    }

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
                <a href="commande.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Commande</a>

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
                    <a href="programe.php" class="nav-item nav-link "><i class="fa fa-chart-bar me-2"></i>Programme</a>
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
            <form class="d-none d-md-flex ms-4" method="POST">
                    <input class="form-control bg-dark border-0" type="search" name="RechercheNom" placeholder="Search">
                    <button class="btn" type="submit">
                                                <i class="icon-search"></i>
                                            </button>
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
       
                

                </body>
<html>

</html>              
       
                


<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

                                       	
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-7">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-10">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"> </h6>
                            <table class="table">
                            <form method="POST" align="center">
                            &nbsp; <button type="submit"  class="btn btn-primary" for="Trie">Trier par : </button>&nbsp;
                                            <select type="range" name="Trie" id="Trie">
                                                <option selected disabled>choisir...</option>
                                                    <option>ordre alphabetique croissant</option>
                                                    <option>ordre alphabetique décroissant</option>
                                            </select>
                                        </form>  
        <thead>
            <tr>
                
            <th>panier</th>
                <th>id_commande</th>
                <th>pay</th>
                <th>adda</th>
                <th>code_post</th>
                <th>f_name</th>
                <th>l_name</th>
                <th>tel</th>
                <th>Delete</th>
                <th>Update</th>
                <th></th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php foreach($listecommande as $commande): ?>
            <tr>
                <td><?php echo $commande['panier']; ?></td>
                <td><?php echo $commande['id_commande']; ?></td>
                <td><?php echo $commande['pay']; ?></td>
                <td><?php echo $commande['adda']; ?></td>
                <td><?php echo $commande['code_post']; ?></td>
                <td><?php echo $commande['f_name']; ?></td>
                <td><?php echo $commande['l_name']; ?></td>
                <td><?php echo $commande['tel']; ?></td>
                <td>
                    <a href="DeleteCommande.php?id_commande=<?php echo $commande['id_commande']; ?>"><button class="btn btn-primary">Supprimer</button></a>   
                </td>
                    <td>
                    <form method="POST" action="UpdateCommande.php" align="center">
                                                        <a type="submit" name="modifierrr" ><button class="btn btn-primary">Modifier</button></a>
                                                        <input type="hidden" value=<?php echo $commande['id_commande']; ?> name="id_commande">
                                                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    

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
