<?php
$db = getPDO();
$id_ens = $_GET['id_ens'];

$stmt = $db->prepare("DELETE FROM enseignant WHERE id_ens = :id;");
$stmt->bindParam(':id', $id_ens, PDO::PARAM_INT);

try {
    $stmt->execute();

    // Redirection en cas de succès
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&success=3"); 
    exit();

} catch(PDOException $e) {
    // Redirection en cas d'erreur
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&error=3&message=" . urlencode($e->getMessage())); 
    exit();
}