<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if(isset($_GET['id_edu'])) {
    $db = getPDO();
    $id_edu = $_GET['id_edu'];

    $stmt = $db->prepare("DELETE FROM appartient WHERE id_edu = :id ;");
    $stmt->bindParam(':id', $id_edu);
    
    try {
        $stmt->execute();

        $stmt = $db->prepare("DELETE FROM ETUDIANT WHERE id_edu = :id ;");
        $stmt->bindParam(':id', $id_edu);
        
        try {
            $stmt->execute();
            header("Location: " . URL_RACINE . "templates/ens/ad/edu.ad.php?success=3"); // Rediriger avec un message de succès
            exit();

        } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/edu.ad.php?error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
        }
        
    } catch(PDOException $e) {
        header("Location: " . URL_RACINE . "templates/ens/ad/edu.ad.php?error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/edu.ad.php?error=3"); // Rediriger avec une erreur de données manquantes
    exit();
}