<?php
$db = getPDO();
$id_classe = $_GET['id_cla'];

$stmt = $db->prepare("DELETE FROM CLASSE WHERE id_cla = :id_classe;");
$stmt->bindParam(':id_classe', $id_classe);

try {
    $stmt->execute();
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&success=3"); // Rediriger avec un message de succès
    exit();
} catch(PDOException $e) {
    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=3&message=" . urlencode($e->getMessage())); // Rediriger avec une erreur de base de données
    exit();
}