<?php

$nom = mb_strtoupper(trim($_POST['nom']) , 'UTF-8');
$prenom = trim($_POST['prenom']); 

$mail = empty($_POST['mail']) ? null : trim($_POST['mail']);
$num_telephone = empty($_POST['num_telephone']) ? null : trim($_POST['num_telephone']);

$id_ens = empty($_POST['enseignant_referent']) ? null : trim($_POST['enseignant_referent']);; 

$id_edu = $_GET['id'];

$stmt = $db->prepare("UPDATE etudiant SET nom_edu = :nom_edu, prenom_edu = :prenom_edu, mail_edu = :mail_edu, num_phone_edu = :num_phone_edu, id_ens = :id_ens WHERE id_edu = :id;");

try {
    $stmt->execute([
        ':nom_edu'          => $nom,
        ':prenom_edu'       => $prenom,
        ':mail_edu'         => $mail,
        ':num_phone_edu'    => $num_telephone,
        ':id_ens'           => $id_ens,
        ':id'               => $id_edu
    ]);

    header("Location: " . URL_RACINE . "onglet.php?pages=info_modif.edu&id=" . $_GET['id'] . "&success=1"); 
    exit();


} catch(PDOException $e) {
    // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&sousPages=ajout.edu.ad&error=1&message=" . urlencode($e->getMessage())); 
    exit();
}