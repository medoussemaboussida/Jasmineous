<?php

    include_once '../../Model/Produit.php';
    include_once '../../Model/Categorie.php';
	include_once '../../Controller/ProduitCRUD.php';
	include_once '../../Controller/CategorieCRUD.php';
	
	$ProduitCRUD = new ProduitCRUD();
	$listeproduit=$ProduitCRUD->AfficherProduit(); 

    $CategorieCRUD = new CategorieCRUD();
	$listecategorietype=$CategorieCRUD->AfficherCategorie();

    $error = "";

    $Produit = null;

    $Produits = new ProduitCRUD();

    if (isset($_POST['modifierrr'])) {

        $image_produit = $_FILES["image_produit"]["name"];
    
        $tmp_image_produit= $_FILES["image_produit"]["tmp_name"];  
    
        $folder = "../Uploads/".$image_produit;
    
        if (
            isset($_POST['nom_produit']) &&		
            isset($_POST['categorie_produit']) &&
            isset($_POST['quantite_produit']) && 
            isset($_POST['prix_produit']) 
            //&&&
            //&isset($_POST['image_produit']) 
    
        ) {
            if (
                !empty($_POST['nom_produit']) &&
                !empty($_POST['categorie_produit']) && 
                !empty($_POST['quantite_produit']) && 
                !empty($_POST['prix_produit'])
                //&&
                //&!empty($_POST['image_produit'])
    
            ) {
    
                $Produit = new Produit(
                    null,
                    $_POST['nom_produit'],
                    $_POST['categorie_produit'], 
                    $_POST['quantite_produit'],
                    $_POST['prix_produit'],
                    //$_POST['image_produit']
                    $folder
                );
    
                $Produits->ModifierProduit($Produit,$_POST['id_produit']);
                header('Location:form.php');
            }
            else{
                $error = "Missing information";
            }
        move_uploaded_file($tmp_image_produit, $folder);
        }        
    }
    
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
                    <a href="Seance.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Seance</a>
                    <a href="form.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Produit</a>
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
                            if (isset($_POST['id_produit'])){
                                $produit = $ProduitCRUD->RecupererProduit($_POST['id_produit']);
                            }
                            ?>
                            <form action=""method="POST" onsubmit="return CTRL()" enctype="multipart/form-data" >
                                <div class="mb-3">
                                    <label for="nom_produit">Nom produit :</label>
                                    <input type="text" class="form-control"  name="nom_produit" id="nom_produit" placeholder="nom du produit" value="<?php echo $produit['nom_produit']; ?>" >
                                </div>
                                <div id="error_nom_produit" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="categorie_produit">Categorie :</label><br>
                                    <select type="range"  name="categorie_produit" id="categorie_produit">
                                    <option selected disabled>choisir...</option>
                                    <?php 
                                                        foreach($listecategorietype as $categorie){
                                                            if($produit['categorie_produit'] == $categorie['id_cat'])
                                                            {
                                                    ?>
                                                    <option selected value="<?php echo $categorie['id_cat'] ?>"><?php echo $categorie['nom_cat'] ?></option>
                                                    <?php
                                                            }
                                                            else
                                                            {
                                                    ?>
                                                    <option value="<?php echo $categorie['id_cat'] ?>"><?php echo $categorie['nom_cat'] ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="quantite_produit">Quantité :</label>
                                    <input type="number" class="form-control" name="quantite_produit" id="quantite_produit" value="<?php echo $produit['quantite_produit']; ?>">
                                </div>
                                <div id="error_quantite_produit" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="prix_produit">Prix (DT):</label>
                                    <input type="number" class="form-control"  name="prix_produit" id="prix_produit" value="<?php echo $produit['prix_produit']; ?>">
                                </div>
                                <div id="error_prix_produit" style="color:red"></div>
                                <div class="mb-3">
                                    <label for="image_produit">Image :</label>
                                    <input type="file" name="image_produit" id="image_produit" value="<?php echo $produit['image_produit']; ?>" accept=".jpg, .jpeg, .png, .gif">
                                </div>
                                <div id="error_image_produit" style="color:red"></div>
                                <input type="submit"  class="btn btn-primary" id="Modifier" name="modifierrr" value="Modifier"> 
                                <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>" >
                            </form>
                        </div>
                    </div>
                    <script>
                                function CTRL()
                                {
                                    var nom_produit=document.getElementById("nom_produit").value;
                                    var error_nom_produit = document.getElementById("error_nom_produit");

                                    var quantite_produit=document.getElementById("quantite_produit").value;
                                    var error_quantite_produit = document.getElementById("error_quantite_produit");

                                    var prix_produit=document.getElementById("prix_produit").value;
                                    var error_prix_produit = document.getElementById("error_prix_produit");

                                    var image_produit=document.getElementById("image_produit").value;
                                    var error_image_produit = document.getElementById("error_image_produit");

                                    if(nom_produit=="")
                                    {
                                        error_nom_produit.innerHTML="Il faut saisie un nom pour le produit !";  
                                        return false;
                                    }
                                    else 
                                        if(nom_produit.charAt(0)>="a" && nom_produit.charAt(0)<="z")
                                        {
                                            error_nom_produit.innerHTML="Il faut que le nom du produit commencé par une lettre majuscule !";  
                                            return false;
                                        }
                                        else
                                        {
                                            error_nom_produit.innerHTML="";  
                                        }

                                    if(quantite_produit=="")
                                    {
                                        error_quantite_produit.innerHTML="Il faut mettre le quantite de ce produit !";  
                                        return false;
                                    }
                                    else 
                                        if(quantite_produit<= 0)
                                        {
                                            error_quantite_produit.innerHTML="Il faut que la quantite du produit doit superieure a 0 !";  
                                            return false;
                                        }
                                        else
                                        {
                                            error_quantite_produit.innerHTML="";  
                                        }
                                    
                                    if(prix_produit=="")
                                    {
                                        error_prix_produit.innerHTML="Il faut mettre le prix de ce produit !";  
                                        return false;
                                    }
                                    else 
                                        if(prix_produit<= 0)
                                        {
                                            error_prix_produit.innerHTML="Il faut que le prix du produit doit superieure a 0 !";  
                                            return false;
                                        }
                                        else
                                        {
                                            error_prix_produit.innerHTML="";  
                                        }

                                    if(image_produit=="")
                                    {
                                        error_image_produit.innerHTML="Il faut mettre une image pour ce produit !";  
                                        return false;
                                    }
                                    else 
                                        {
                                            error_image_produit.innerHTML="";  
                                        }
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