<?php
$db = getPDO();
$annee_scolaire = $_POST['annee_scolaire'];

$stmt = $db->prepare("INSERT INTO ANNEE_SCOLAIRE (annee_scolaire) VALUES (:annee_scolaire)");
$stmt->bindParam(':annee_scolaire', $annee_scolaire);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&success=2"); // Rediriger avec un message de succès
    exit();
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=2&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}