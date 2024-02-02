<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Panel</title>
    <meta charset="utf-8">
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
    
</body>
</html>


<?php

include '../../Controller/UserC.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new UserC();
if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["user_type"])
) {
    if (
        !empty($_POST['name']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["user_type"])
    ) {
        $user = new User(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['user_type']
        );
        $userC->addUser($user);
        header('Location:ListUsers.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>User Display</title>
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
              <a href="../../View/Front/index.php" class="navbar-brand mx-4 mb-3">
                  <h3 class="text-primary"></i>JASMINEOUS</h3>
              </a>
              <div class="d-flex align-items-center ms-4 mb-4">
                  <div class="position-relative">
                      
                      <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                  </div>
                  <div class="ms-3">
                      <h6 class="mb-0">Skander landolsi</h6>
                      <span>Admin</span>
                  </div>
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
              <a href="config2.php" class="sidebar-toggler flex-shrink-0">
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
                                  
                                  <div class="ms-2">
                                      <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                      <small>15 minutes ago</small>
                                  </div>
                              </div>
                          </a>
                          <hr class="dropdown-divider">
                          <a href="#" class="dropdown-item">
                              <div class="d-flex align-items-center">
                                 
                                  <div class="ms-2">
                                      <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                      <small>15 minutes ago</small>
                                  </div>
                              </div>
                          </a>
                          <hr class="dropdown-divider">
                          <a href="#" class="dropdown-item">
                              <div class="d-flex align-items-center">
                                  
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
                          
                          <span class="d-none d-lg-inline-flex">Skander Landolsi</span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                          <a href="https://www.facebook.com/SkanderLandolsi07" class="dropdown-item">My Profile</a>
                          <a href="#" class="dropdown-item">Settings</a>
                          <a href="admin_login.php" class="dropdown-item">Log Out</a>
                      </div>
                  </div>
              </div>
          </nav>
          <br>
   &nbsp; <a href="ListUsers.php" class="btn btn-primary">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" >
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="name">Name:
                    </label>
                </td>
                <td><input type="text" name="name" id="name" maxlength="20"  ></td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:
                    </label>
                </td>
                <td><input type="text" name="email" id="email" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="password">password:
                    </label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="user_type">Type d'utilisateur:
                        <select name="user_type">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                            
                     </select>
                    </label>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" class="btn btn-primary" value="Save">
                </td>
                <td>
                    <input type="reset" class="btn btn-primary" value="Reset">
                </td>
            </tr>
        </table>
    
    </form>
</body>

</html>