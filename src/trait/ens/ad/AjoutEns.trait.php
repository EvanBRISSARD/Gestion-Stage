<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if (isset($_POST['nom'])) {
    
    if (empty(trim($_POST['nom']))) {
        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEns.ad.php?error=1");
        exit();
    }

    $db = getPDO();

    $nom = mb_strtoupper(trim($_POST['nom']), 'UTF-8');
    
    $mail = empty($_POST['mail']) ? null : trim($_POST['mail']);
    $ap_option = isset($_POST['ap_option']) ? 1 : 0 ;
    $ad_option = isset($_POST['ad_option']) ? 1 : 0 ;

    $stmt = $db->prepare("INSERT INTO ENSEIGNANT (nom_ens, mail_ens, AP_ens, AD_ens) value (:nom_ens, :mail_ens, :AP_ens, :AD_ens);");
    
    try {
        $stmt->execute([
            ':nom_ens' => $nom,
            ':mail_ens' => $mail,
            ':AP_ens' => $ap_option,
            ':AD_ens' => $ad_option,
        ]);

        // Redirection vers la page de succès
        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEns.ad.php?success=1"); 
        exit();
        
    } catch(PDOException $e) {
        // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEns.ad.php?error=1&message=" . urlencode($e->getMessage())); 
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEns.ad.php?error=1");
    exit();
}