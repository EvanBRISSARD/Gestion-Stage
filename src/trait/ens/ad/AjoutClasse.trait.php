<?php
$db = getPDO();
$nom_classe = $_POST['nom_classe'];

$stmt = $db->prepare("INSERT INTO classe (nom_cla) VALUES (:nom_classe);");
$stmt->bindParam(':nom_classe', $nom_classe);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&success=1"); // Rediriger avec un message de succès
    exit();
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=1&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}