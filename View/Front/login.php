<?php
session_start();

@include 'connect.php';

require("ban.php");
check_if_banned();


if(isset($_SESSION['id'])){
   $user_id = $_SESSION['id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){
   if(count($_POST) > 0) {

		$string = "mysql:host=localhost;dbname=user_db";
		if(!$con = new PDO($string,'root','')){
			die("could not connect");
		}

 		$query = "select * from user_hub where email = :email && password = :password limit 1";
		$stm = $con->prepare($query);
		if($stm){
			$check = $stm->execute([
				'email'=>$_POST['email'],
				'password'=>$_POST['password'],
			]);

			if($check){
				$row = $stm->fetchAll(PDO::FETCH_ASSOC);
				if(is_array($row) && count($row) > 0){
					$row = $row[0];

					//success
					check_if_banned(true,true);
					header("Location: index.php");
					die;
				}
			}
		}

		//failure
		echo "failed";
		check_if_banned(true,false);
	}

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['password']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `user_hub` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page  </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medilab Free Bootstrap HTML5 Template</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

</head>
<body>
   
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
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="signup.php">register now</a></p>
      <a href="forgot.php">Forget Password ?</a>
      <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
   </form>

</div>

</body>
</html>