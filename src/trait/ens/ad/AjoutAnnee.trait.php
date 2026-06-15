<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_POST['annee_scolaire'])) {
    if(empty($_POST['annee_scolaire'])) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=2&message=" . urlencode("L'année scolaire est obligatoire.")); // Rediriger avec une erreur de données manquantes
        exit();
    }
    $db = getPDO();
    $annee_scolaire = $_POST['annee_scolaire'];

    $stmt = $db->prepare("INSERT INTO ANNEE_SCOLAIRE (annee_scolaire) VALUES (:annee_scolaire)");
    $stmt->bindParam(':annee_scolaire', $annee_scolaire);
    
    try {
        $stmt->execute();
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?success=2"); // Rediriger avec un message de succès
        exit();
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=2&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=2"); // Rediriger avec une erreur de données manquantes
    exit();
}