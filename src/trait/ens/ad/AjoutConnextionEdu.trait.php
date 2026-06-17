<?php
$db = getPDO();

$nom_nettoye = trim(trim($_POST['nom']));
$premiere_lettre = mb_substr($nom_nettoye, 0, 1, 'UTF-8');

$login = $premiere_lettre . '.' . trim($_POST['prenom']);

// mot de pass Temporaire
$longueur = 16;

$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$nombreCaracteres = strlen($caracteres);
$motDePasse = '';

for ($i = 0; $i < $longueur; $i++) {
    $indexAleatoire = random_int(0, $nombreCaracteres - 1);
    $motDePasse .= $caracteres[$indexAleatoire];
}

$passHacher = password_hash($motDePasse, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO connexion_edu (login_eduConc, pass_eduConc, id_edu) value (:login_eduConc, :pass_eduConc, :id_edu) ;");

try {
    $stmt->execute([
        ':login_eduConc' => $login,
        ':pass_eduConc' => $passHacher,
        ':id_edu' => $id_edu_cree
    ]);
} catch(PDOException $e) {
    // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&sousPages=ajout.edu.ad&error=1&message=" . urlencode($e->getMessage())); 
    exit();
}