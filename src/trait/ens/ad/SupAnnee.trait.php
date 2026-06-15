<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_GET['annee_scolaire'])) {
    $db = getPDO();
    $annee_scolaire = $_GET['annee_scolaire'];

    $stmt = $db->prepare("DELETE FROM ANNEE_SCOLAIRE WHERE annee_scolaire = :annee_scolaire;");
    $stmt->bindParam(':annee_scolaire', $annee_scolaire);
    
    try {
        $stmt->execute();
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?success=4"); // Rediriger avec un message de succès
        exit();
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=4&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=4"); // Rediriger avec une erreur de données manquantes
    exit();
}