<?php
$db = getPDO();
$id_ens = $_GET['id_ens'];

$stmt = $db->prepare("DELETE FROM ENSEIGNANT WHERE id_ens = :id ;");
$stmt->bindParam(':id', $id_ens);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&success=3"); // Rediriger avec un message de succès
    exit();
    
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}