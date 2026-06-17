<?php

$db = getPDO();

$nom = mb_strtoupper(trim($_POST['nom']), 'UTF-8');

$mail = empty($_POST['mail']) ? null : trim($_POST['mail']);
$ap_option = isset($_POST['ap_option']) ? 1 : 0 ;
$ad_option = isset($_POST['ad_option']) ? 1 : 0 ;

$stmt = $db->prepare("INSERT INTO enseignant (nom_ens, mail_ens, AP_ens, AD_ens) value (:nom_ens, :mail_ens, :AP_ens, :AD_ens);");

try {
    $stmt->execute([
        ':nom_ens' => $nom,
        ':mail_ens' => $mail,
        ':AP_ens' => $ap_option,
        ':AD_ens' => $ad_option,
    ]);

    $id_ens_cree = $db->lastInsertId();

    require_once CHEMIN_RACINE . 'src/trait/ens/ad/AjoutConnextionEns.trait.php';

    // Redirection vers la page de succès
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad&success=1&message=" . urlencode("Mot de pass temporaire : " . $motDePasse)); 
    exit();
    
} catch(PDOException $e) {
    // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad&error=1&message=" . urlencode($e->getMessage())); 
    exit();
}