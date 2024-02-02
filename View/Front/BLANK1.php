<?php
 session_start();

 include_once '../../Model/Seance.php';
 include_once '../../Model/Reservation.php';
 include_once '../../Controller/SeanceCRUD.php';
 include_once '../../Controller/ReservationCRUD.php';
$reservationCRUD = new reservationCRUD();

$error = "";
 $k=1;
 $k=$k+1;

$reservation = null;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require   'phpmailer/src/Exception.php';
require   'phpmailer/src/PHPMailer.php';
require   'phpmailer/src/SMTP.php';



if (
  isset($_POST['id_seance']) &&	
  isset($_POST['type_reservation']) &&	
  isset($_POST['username']) &&
  isset($_POST['email']) && 
  isset($_POST['date_reservation']) 
  &&
  isset($_POST['phone']) 

) {
    
  if (
    !empty($_POST['id_seance']) && 
    !empty($_POST['type_reservation']) &&
    !empty($_POST['username']) && 
    !empty($_POST['email']) && 
    !empty($_POST['date_reservation'])&&
    !empty($_POST['phone'])

  ) {

    $reservation = new reservation(
      null,
      $_POST['type_reservation'],
      $_POST['username'], 
      $_POST['email'],
      $_POST['date_reservation'],
      $_POST['phone'],
      $_POST['id_seance']
    );
    

          
      
    
      
   
    //header('Location:BLANK1.php');
  
  }
  else{
    $error = "Missing information";
  }
}



    
 if(isset($_POST['captcha'])){

    
     if($_POST['captcha'] === $_SESSION['code_confirmation']){
      $reservationCRUD->Ajouterreservation($reservation);
      $mail=new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host ='smtp.gmail.com';
      $mail->SMTPAuth=true;
      $mail->Username='maddeh.fathi@esprit.tn';
      $mail->Password='jfslwstgttimdikj';
      $mail->SMTPSecure='ssl';
      $mail->Port=465;
      $mail->setFrom('maddeh.fathi@esprit.tn');
      $mail->addAddress('maddeh.fathi@esprit.tn');
      $mail->isHTML(true);
    
      $mail->Subject="THANK YOU";
      $mail->Body="YOUR RESERVATION HAS BEEN MADE SUCCESSFULLY";
      $mail->send();
      
          $message ='<p class="text-success" id="msg">Message Submitted Successfully</p>';
          header('Location:BLANK2.HTML');    
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
  <div class="container">

<div class="popup">
<img src="404-tick.png">
<h2 style="color:black;" >verification Code Captcha</h2>
<br><br>
<br>
<div class="controls">
		<img src="generatecaptcha.php?rand=<?php echo rand(); ?>" name="captcha_img" id='image_captcha' > 
		<a href='javascript: refreshing_Captcha();'><i class="icon-refresh icon-large"></i></a> 
		<script language='JavaScript' type='text/javascript'>
    
			function refreshing_Captcha()
			{
				var img = document.images['image_captcha'];
				img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
			}
		</script>
    <br><br><br>
    <form method="POST" enctype="multipart/form-data" action=""onsubmit="/*return CTRL()*/">
   <?php if (
  isset($_POST['type_reservation']) &&	
  isset($_POST['username']) &&
  isset($_POST['email']) && 
  isset($_POST['date_reservation']) 
  &&
  isset($_POST['phone']) && 
  isset($_POST['id_seance']) 

) {

  if (
    !empty($_POST['type_reservation']) &&
    !empty($_POST['username']) && 
    !empty($_POST['email']) && 
    !empty($_POST['date_reservation'])&&
    !empty($_POST['phone'])&&
    !empty($_POST['id_seance'])

  ) {

    $reservation = new reservation(
      null,
      $_POST['type_reservation'],
      $_POST['username'], 
      $_POST['email'],
      $_POST['date_reservation'],
      $_POST['phone'],
      $_POST['id_seance']
    );
  }}
    ?>
     <div class="checkout__input">
           <input type="text" name="captcha" style="width:110%" id="captcha" class="form-control" value=""  placeholder="Enter Captcha">
           </div>
           <button type="submit" id="verify_captcha" class="btn btn-primary ml-3 ">Verify Captcha</button>
           <input type="hidden" value=<?php echo $reservation->get_username(); ?> name="username">
           <input type="hidden" value=<?php echo $reservation->get_type_reservation(); ?> name="type_reservation">
           <input type="hidden" value=<?php echo $reservation->get_email(); ?> name="email">
           <input type="hidden" value=<?php echo $reservation->get_date_reservation(); ?> name="date_reservation">
           <input type="hidden" value=<?php echo $reservation->get_phone(); ?> name="phone">
           <input type="hidden" value=<?php echo $reservation->get_id_seance(); ?> name="id_seance">
           
       <p id="show" style="text-align:center;"><?php  if(isset($message)){
              echo $message;
              }session_unset();?></p>
                
		</div>
<p>Your Reservation has been successfully submitted.Thanks!</p> 


</div>

</form>

  </div>

  
</body>

<style>
.checkout__input input {
    height: 50px;
    width: 100%;
    border: 1px solid #e1e1e1;
    font-size: 14px;
    color: #b7b7b7;
    padding-left: 20px;
    margin-bottom: -10px;
}
.controls
{
height:300px;
width:300px;
margin: 0 10px;
padding:20px;
background:#fff;
border-radius:5px;
text-align:center;
position:relative;


}

.container
{
width:200%;
height:100vh;
background:#3c5077;
display :flex;
align-items:center;
justify-content:center;
}
.popup{
    
width:400px;
background:#fff;

border-radius:6px;
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
padding:0 30px 30px;
color:#333;



}
.popup h2
{
font-size: 38px;
font-weight:500;
margin:30px 0 10px;


}
.popup button
{

width:100%;
margin-top:50px;
padding:10px 0;
background: #6fd649;
color:#fff;
border:0;
outline:none;
font-size:18px;
border-radius:4px;



}
.popup img{
width:100px;
margin-top: -50px;
border-radius: 50%;
box-shadow: 0 2px 5px rgba(0,0,0,0.2);



}
.controls img{
width:200px;
align:center;



}
</style>



</html>