<?php
    require '../../Controller/reclamationC.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

include_once '../../FC/PHPMailer/src/Exception.php';
include_once '../../FC/PHPMailer/src/PHPMailer.php';
include_once '../../FC/PHPMailer/src/SMTP.php';
    $reclamation = new reclamationController();
    if(isset($_POST['send'])) {
      $description_rec = $_POST['description_rec'];
      $image_rec = $_POST['image_rec'];
      $event_rec = $_POST['event_rec'];
      $mail_rec = $_POST['mail_rec'];
      $reclamation->insertReclam( $description_rec, $image_rec, $event_rec,$mail_rec);
      $mail=new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host ='smtp.gmail.com';
      $mail->SMTPAuth=true;
      $mail->Username='nour.amara@esprit.tn';
      $mail->Password='iyjwhimzbgygxakj';
      $mail->SMTPSecure='ssl';
      $mail->Port=465;
      $mail->setFrom('nour.amara@esprit.tn');
      $mail->addAddress($_POST["mail_rec"]);
      $mail->isHTML(true);
      $mail->Subject="Votre reclamation est prise en consideration";
      $mail->Body="Votre reclamation est prise en consideration";
      $mail->send();

    header('location: indexPC.php');
    }
?>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Reclamation</title>
</head>
<body>
<div class="container mt-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Reclamation
                    <a href="AffichageR.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" onsubmit="return CTRL()">

                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description_rec"  id ="description_rec" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image_rec" id="image_rec" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label>Event</label>
                        <input type="text" name="event_rec" id="event_rec" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label>mail_rec</label>
                        <input type="email" name="mail_rec"  id ="mail_rec" class="form-control" >
                    </div>
                   
                    <div class="mb-3">
                        <button type="submit" name="send" class="btn btn-primary">Save Reclam</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

</body>




