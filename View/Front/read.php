<?php
include_once '../../Controller/evenementController.php';
$evenementController = new evenementController();
    $id = $_GET['id_e'];
    $event = $evenementController->getEventByIdf($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Client</title>
</head>
<body>

<div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Details 
                            <a href="indexPC.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <div class="mb-3">
                                        <label>Titre</label>
                                        <p class="form-control">
                                            <?=$event->titre_e?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <br>
                                        <a><img class="" src="<?= $event->image_e;?>" style="width: 500px; height:100px;"></a>

                                        </div>
                                    
                                    <div class="mb-3">
                                        <label>Description</label>
                                        <p class="form-control">
                                            <?=$event->description_e?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date Event</label>
                                        <p class="form-control">
                                            <?=$event->date_e?>
                                        </p>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>