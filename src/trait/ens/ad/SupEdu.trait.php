<?php

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
        header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&success=3"); // Rediriger avec un message de succès
        exit();

    } catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
    }
    
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.en&?error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}