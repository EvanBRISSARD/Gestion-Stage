<?php
$db = getPDO();

$login = '@' . trim($_POST['nom']);

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

$stmt = $db->prepare("INSERT INTO connexion_ens (login_ensConc, pass_ensConc, id_ens) value (:login_ensConc, :pass_ensConc, :id_ens) ;");

try {
    $stmt->execute([
        ':login_ensConc' => $login,
        ':pass_ensConc' => $passHacher,
        ':id_ens' => $id_ens_cree
    ]);
} catch(PDOException $e) {
    // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad&error=1&message=" . urlencode($e->getMessage())); 
    exit();
}