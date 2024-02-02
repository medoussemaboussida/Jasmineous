<?php
    require '../Controller/reclamationC.php';
    $reclamationController = new reclamationController();
    $id_rec = $_GET['id_rec'];
    $reclam = $reclamationController->getReclamById($id_rec);
    if(isset($_POST['update_reclam'])) {
        $newDesc=$_POST['description_rec'];
        $newIMAGE = $_POST['image_rec'];
        $newevent_rec=$_POST['event_rec'];
        $newmail_rec=$_POST['mail_rec'];
        $reclamationController->updateReclam($id_rec, $newDesc, $newIMAGE, $newevent_rec, $newmail_rec);
        header("location: afichageR.php");
    }
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Event</title>
</head>
<body>
<div class="container mt-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Update Reclam 
                    <a href="afichageR.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">

                <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description_rec" value="<?=$reclam->description_rec?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image_rec" value="<?=$reclam->image_rec?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label>Event_rec</label>
                        <input type="text" name="event_rec" value="<?=$reclam->event_rec?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>mail_rec</label>
                        <input type="email" name="mail_rec" value="<?=$reclam->mail_rec?>" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" name="update_reclam" class="btn btn-primary">Update reclam</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>