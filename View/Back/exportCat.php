<?php

$dsn = 'mysql:host=localhost;dbname=the_globe';
$username = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $username, $password);

    $sql = "SELECT nom_cat FROM categories";
    $stmt = $dbh->query($sql);

    $columnHeader = '';
    $columnHeader = "" . "\t" . "Nom categorie";

    $setData = '';
    while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= " " . "\t" . trim($rowData) . "\n";
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=ListeDesCategories.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    echo ucwords(" " . "\n" . $columnHeader . "\n" . $setData . "\n");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
