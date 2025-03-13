<?php
function addToJson($newItem, $key, $jsonFile = "../data/data.json") {
    // Lire le fichier JSON
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);

    // Vérifier si la clé existe dans le JSON
    if (!isset($data[$key]) || !is_array($data[$key])) {
        return false; // Retourne false si la clé n'existe pas ou n'est pas un tableau
    }

    // Ajouter le nouvel élément
    $data[$key][] = $newItem;

    // Sauvegarder les données mises à jour
    file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

    return true; // Retourne true en cas de succès
}
