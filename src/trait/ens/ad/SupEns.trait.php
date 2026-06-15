<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_GET['id_ens'])) {
    $db = getPDO();
    $id_ens = $_GET['id_ens'];

    $stmt = $db->prepare("DELETE FROM ENSEIGNANT WHERE id_ens = :id ;");
    $stmt->bindParam(':id', $id_ens);
    
    try {
        $stmt->execute();
        header("Location: " . URL_RACINE . "templates/ens/ad/ens.ad.php?success=3"); // Rediriger avec un message de succès
        exit();
        
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/ens.ad.php?error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/ens.ad.php?error=3"); // Rediriger avec une erreur de données manquantes
    exit();
}