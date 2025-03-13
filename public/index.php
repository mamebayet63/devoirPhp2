<?php

define("WEBROOT", "http://khalil.ecole221.sn:8000/"); // Définir l'URL de base

define("ROOT_PATH", dirname(__DIR__)); // Définir le chemin racine du projet

require_once( ROOT_PATH . "/model/model.php"); // Charger le modèle
// require_once ROOT_PATH . "/config/helpers.php"; // Charger les helpers

// Liste des contrôleurs disponibles
$controllers = [
    // "commande" => "commande.controller.php",
    "client"   => "client.controller.php",
];

// Récupérer le contrôleur demandé, ou utiliser "security" par défaut
$controller = $_GET["controller"] ?? "client";

// Vérifier si le contrôleur existe dans la liste, sinon charger le contrôleur par défaut
$controllerFile = $controllers[$controller] ?? $controllers["client"]; 

// Charger le fichier du contrôleur
require_once ROOT_PATH . "/controller/" . $controllerFile;
?>
