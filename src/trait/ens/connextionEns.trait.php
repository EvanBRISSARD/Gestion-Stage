<?php
if (isset($_POST['Identifiant']) && isset($_POST['password'])) {
    $identifiant = $_POST['Identifiant'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($identifiant) || empty($password)) {
        header("Location: ". URL_RACINE . "tableau_de_bord.php?pages=connextionEns&error=1");
    }

    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM CONNEXION_ENS WHERE login_ensConc = :identifiant");
    $stmt->execute(['identifiant' => $identifiant]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pass_ensConc'])) {
        // Authentification réussie
        session_start();
        $_SESSION['user_id'] = $user['id_ens'];
        header("Location: ". URL_RACINE . "enseignants.php?pages=candidatures.per.ens");
        exit;
    } else {
        header("Location: ". URL_RACINE . "tableau_de_bord.php?pages=connextionEns&error=1");
    }
} else {
    header("Location: ". URL_RACINE . "tableau_de_bord.php?pages=connextionEns&error=1");
}