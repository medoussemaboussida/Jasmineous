<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=the_globe', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

// Requête SQL pour récupérer les données
$sql = "SELECT nom_produit, nom_cat, quantite_produit, prix_produit, image_produit FROM produits INNER JOIN categories ON id_cat=categorie_produit";
$stmt = $bdd->prepare($sql);
$stmt->execute();

// En-tête de colonne
$columnHeader = '';
$columnHeader = "Nom\tCateg\tQuant\tPrix\tImage";

// Données
$setData = '';
while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= " " . "\t" . trim($rowData) . "\n";
}

// En-tête HTTP pour télécharger un fichier Excel
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=ListeDesProduits.xls');
header('Pragma: no-cache');
header('Expires: 0');

// Affichage des données formatées en Excel
echo ucwords(" " . "\n" . $columnHeader . "\n" . $setData . "\n");
?>