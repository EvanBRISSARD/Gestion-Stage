<?php
$db = getPDO();
$annee_scolaire = $_GET['annee_scolaire'];

$stmt = $db->prepare("DELETE FROM ANNEE_SCOLAIRE WHERE annee_scolaire = :annee_scolaire;");
$stmt->bindParam(':annee_scolaire', $annee_scolaire);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&success=4"); // Rediriger avec un message de succès
    exit();
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=4&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}