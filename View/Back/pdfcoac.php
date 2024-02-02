<?php
	include_once '../../config.php';
	include_once '../../Model/Categorie.php';
    include_once '../../Model/produit.php';
	include_once '../../Controller/produitCRUD.php';
    include_once '../../Model/program.php';
    include_once '../../Model/demande.php';
	include_once '../../Controller/programCRUD.php';
	include_once '../../Controller/demandeCRUD.php';
	
	$programCRUD = new programCRUD();

	$listeprogram=$programCRUD->Afficherprogram(); 

    $error = "";

    $program = null;

    $programs = new programCRUD();

    if (
		isset($_POST['id_demande'])&&
        isset($_POST['type_demande'])&&
        isset($_POST['Desc_diet'])&&
        isset($_POST['Desc_wokrout'])
    ) {
        if (
			!empty($_POST['id_demande'])&&
        !empty($_POST['type_demande'])&&
        !empty($_POST['Desc_diet'])&&
        !empty($_POST['Desc_wokrout'])
        ) {
            $program = new program(
                null,
				$_POST['id_demande'],
                $_POST['type_demande'],
                $_POST['Desc_diet'],
                $_POST['Desc_workout']
            );
            $programs->Ajouterprogram($program);
            header('Location:table.php');
        }
        else
            $error = "Missing information";
    }   
    
    
    else{
        $error = "Missing information";
    }

   require_once('fpdf/fpdf.php');

    $db = new PDO('mysql:host=localhost;dbname=final','root','');
    
       class PDF extends FPDF{
    
        function header(){
            $this->SetFont('Arial','B',24);
            $this->Cell(0,10,'La liste de Program',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',20);
            $this->Cell(0,10,'JASMINOUS',0,0,'C');
            $this->Ln(20);
        }
    
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    
        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(30,10,'id_demande',1,0,'C');
            $this->Cell(30,10,'type_demande',1,0,'C');
            $this->Cell(30,10,'Desc_demande',1,0,'C');
            $this->Cell(30,10,'Desc_workout',1,0,'C');
            $this->Ln();
        }
    
        function viewTable($db ,$id){
            $this->SetFont('Times','',10);
            $liste = $db->query('SELECT * FROM program where id_demande='.$id);
            while($data = $liste->fetch(PDO::FETCH_OBJ)){
                $this->Cell(30,10,$data->id_demande,1,0,'C');
                $this->Cell(30,10,$data->type_demande,1,0,'C');
                $this->Cell(30,10,$data->Desc_diet,1,0,'C');
                $this->Cell(30,10,$data->Desc_workout,1,0,'C');
                $this->Ln();
            }
        }
    
       }
    
      
       // Instantiation of FPDF class
       $pdf = new PDF();
      
       $pdf->AliasNbPages();
       $pdf->AddPage();
       $pdf->headerTable();
       $pdf->viewTable($db,$_GET['id']);
       $pdf->Output("Listprogram.pdf","D");
    
?>




