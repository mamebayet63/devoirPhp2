<?php

require_once ROOT_PATH . "/model/detteModel.php";

$page = $_REQUEST["page"] ?? "alldette";

// Démarrer le tampon de sortie
ob_start();





function handleDettePage() {
    $dettes = findAllDettes();

    if (!empty($_GET["tel"])) {
        $tel = filter_var(trim($_GET["tel"]), FILTER_SANITIZE_NUMBER_INT);
        $dettes = findCommandeByTelClient($tel);
    }

    require_once("../views/dettes/listeDette.html.php");
}


function handleAjoutPage() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Récupérer les données du formulaire
        $nom_client = filter_var(trim($_POST['nom_client']), FILTER_SANITIZE_STRING);
        $telephone_client = filter_var(trim($_POST['telephone_client']), FILTER_SANITIZE_NUMBER_INT);
        $montant = filter_var(trim($_POST['montant']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $date_echeance = $_POST['date_echeance'];
        $description = isset($_POST['description']) ? filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING) : '';
    
        // Logique pour insérer dans la base de données
        if (addDette($nom_client, $telephone_client, $montant, $date_echeance, $description)) {
            // Redirection ou message de succès
            echo "Dette ajoutée avec succès!";
        } else {
            // Message d'erreur
            echo "Erreur lors de l'ajout de la dette.";
        }
    }
    
    function addDette($nom_client, $telephone_client, $montant, $date_echeance, $description) {
        // Exemple de requête SQL pour insérer la dette dans la base de données
        $query = "INSERT INTO dettes (nom_client, telephone_client, montant, date_echeance, description)
                  VALUES (:nom_client, :telephone_client, :montant, :date_echeance, :description)";
        
        $stmt = $pdo->prepare($query);
        return $stmt->execute([
            ':nom_client' => $nom_client,
            ':telephone_client' => $telephone_client,
            ':montant' => $montant,
            ':date_echeance' => $date_echeance,
            ':description' => $description
        ]);
    }
    
    require_once("../views/dettes/ajoutDette.html.php");
}


// Gestion des pages
switch ($page) {
    case 'alldette':
        handleDettePage();
        break;
    case 'ajout':
        handleAjoutPage();
        break;
}

// Récupération du contenu et inclusion de la mise en page
$content = ob_get_clean();
require_once "../layout/layoutBase.php";

?>
