<?php

require_once ROOT_PATH . "/model/clientModel.php";

$page = $_REQUEST["page"] ?? "client";

// Démarrer le tampon de sortie
ob_start();

function validateClient($data) {
    $errors = [];

    // Vérifier si le nom est présent et valide
    if (empty($data['nom'])) {
        $errors["nom"] = "Le nom est requis.";
    } 

    // Vérifier si le prénom est présent et valide
    if (empty($data['prenom'])) {
        $errors["prenom"] = "Le prénom est requis.";
    } 

    // Vérifier si le téléphone est valide
    if (empty($data['tel'])) {
        $errors["tel"] = "Le numéro de téléphone est requis.";
    } elseif (!preg_match("/^\\+?[0-9]{8,15}$/", $data['tel'])) {
        $errors["tel"] = "Le numéro de téléphone est invalide.";
    }

    return $errors;
}

// Fonction pour vérifier si le téléphone existe déjà
function isPhoneNumberUnique($tel) {
    $clients = jsonToarray("clients"); // Cette fonction récupère tous les clients du fichier JSON
    foreach ($clients as $client) {
        if ($client['telephone'] === $tel) {
            return false; // Si le numéro existe déjà, retourne false
        }
    }
    return true; // Si le numéro n'existe pas, retourne true
}

function handleClientPage() {
    $clients = findAllClient();

    if (!empty($_GET["tel"])) {
        $tel = filter_var(trim($_GET["tel"]), FILTER_SANITIZE_NUMBER_INT);
        $clients = findClientByTel($tel);
    }

    require_once("../views/Client/liste.html.php");
}

function handleAjoutClientPage() {
    $_SESSION['errors'] = $_SESSION['errors'] ?? [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = validateClient($_POST);
        
        // Vérification de l'unicité du numéro de téléphone
        if (empty($errors) && !isPhoneNumberUnique($_POST['tel'])) {
            $errors["tel"] = "Ce numéro de téléphone est déjà utilisé.";
        }

        if (empty($errors)) {
            // Ajouter dans le fichier JSON
            $newClient = [
                "id" => time(), // ID unique basé sur timestamp
                "telephone" => $_POST['tel'],
                "nom" => $_POST['nom'],
                "prenom" => $_POST['prenom'],
                "adresse" => $_POST['adresse'] ?? ""
            ];
            addToJson($newClient, "clients");
            
            $_SESSION['success'] = "Client ajouté avec succès.";
            header('Location: index.php?page=client');
            exit;
        } else {
            $_SESSION['errors'] = $errors;
        }
    }

    require_once("../views/Client/ajout.html.php");
}

// Gestion des pages
switch ($page) {
    case 'client':
        handleClientPage();
        break;
    case 'ajout':
        handleAjoutClientPage();
        break;
}

// Récupération du contenu et inclusion de la mise en page
$content = ob_get_clean();
require_once "../layout/layoutBase.php";

?>
