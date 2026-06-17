<?php
$db = getPDO();
$id_sta = $_GET['id_sta'];

$stmt = $db->prepare("DELETE FROM stage WHERE id_sta = :id ;");
$stmt->bindParam(':id', $id_sta);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=planificationStage.ad.ens&success=3"); // Rediriger avec un message de succès
    exit();
    
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=planificationStage.ad.ens&error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}