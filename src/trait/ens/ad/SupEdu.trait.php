<?php
$db = getPDO();
$id_edu = $_GET['id_edu'];

$stmt = $db->prepare("DELETE FROM etudiant WHERE id_edu = :id;");
$stmt->bindParam(':id', $id_edu, PDO::PARAM_INT);

try {
    $stmt->execute();

    // Si on arrive ici, l'étudiant ET toutes ses dépendances ont été supprimés en cascade
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&success=3");
    exit();

} catch(PDOException $e) {
    // En cas d'erreur (ex: problème de connexion BDD)
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&error=3&message=" . urlencode($e->getMessage()));
    exit();
}