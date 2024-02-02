<?php
session_start();

@include 'config2.php';
include '../../Model/User.php';



if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_hub WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:addUser.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $error[] = 'This is a USER!';

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>BackEnd Login</title>
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
   <br>
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email" >
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="btn btn-primary">
     <style>
      .form-container {
  background-color: #999; /* Couleur de fond grise pour le conteneur du formulaire */
  padding: 20px;
  width: 500px; /* Largeur du conteneur du formulaire */
  margin: 0 auto; /* Centrer horizontalement le formulaire */
}

.form-container form {
  display: flex;
  flex-direction: column;
  align-items: center; /* Centrer verticalement les éléments du formulaire */
}

.form-container h3 {
  color: #fff; /* Couleur du texte blanc pour le titre du formulaire */
}

.form-container input[type="email"],
.form-container input[type="password"] {
  margin-bottom: 10px;
}

.form-container .error-msg {
  color: #ff0000; /* Couleur du texte rouge pour les messages d'erreur */
}

     </style>
   </form>

</div>

</body>
</html>