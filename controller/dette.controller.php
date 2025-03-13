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



// Gestion des pages
switch ($page) {
    case 'alldette':
        handleDettePage();
        break;
    case 'ajout':
        handleDettePage();
        break;
}

// Récupération du contenu et inclusion de la mise en page
$content = ob_get_clean();
require_once "../layout/layoutBase.php";

?>
