<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_GET['id'])) {
    $db = getPDO();
    $id_classe = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM CLASSE WHERE id_cla = :id_classe;");
    $stmt->bindParam(':id_classe', $id_classe);
    
    try {
        $stmt->execute();
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?success=3"); // Rediriger avec un message de succès
        exit();
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/classifier.ad.php?error=3"); // Rediriger avec une erreur de données manquantes
    exit();
}