<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_POST['nom_classe'])) {
    if(empty($_POST['nom_classe'])) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=1&message=" . urlencode("Le nom de la classe est obligatoire.")); // Rediriger avec une erreur de données manquantes
        exit();
    }
    $db = getPDO();
    $nom_classe = $_POST['nom_classe'];

    $stmt = $db->prepare("INSERT INTO CLASSE (nom_cla) VALUES (:nom_classe);");
    $stmt->bindParam(':nom_classe', $nom_classe);
    
    try {
        $stmt->execute();
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?success=1"); // Rediriger avec un message de succès
        exit();
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=1&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=1"); // Rediriger avec une erreur de données manquantes
    exit();
}