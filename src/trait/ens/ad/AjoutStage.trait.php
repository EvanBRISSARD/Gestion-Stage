<?php
$db = getPDO();

$date_debut_sta = $_POST['date_debut'];
$date_fin_sta = $_POST['date_fin'];
$annee_scolaire = $_POST['annee_scolaire_etud'];


$stmt = $db->prepare("INSERT INTO stage (date_debut_sta, date_fin_sta, annee_scolaire) VALUE (:date_debut_sta, :date_fin_sta, :annee_scolaire);");

try {
    $stmt->execute([
        ':date_debut_sta' => $date_debut_sta,
        ':date_fin_sta' => $date_fin_sta,
        ':annee_scolaire' => $annee_scolaire
    ]);

    header("Location: " . URL_RACINE . "enseignants.php?pages=planificationStage.ad.ens&sousPages=ajoutStage.ad.ens&success=1"); 
    exit();

} catch(PDOException $e) {
    // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
    header("Location: " . URL_RACINE . "enseignants.php?pages=planificationStage.ad.ens&sousPages=ajoutStage.ad.ens&error=1&message=" . urlencode($e->getMessage())); 
    exit();
}