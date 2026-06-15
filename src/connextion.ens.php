<?php
require_once __DIR__ . '/../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if (isset($_POST['Identifiant']) && isset($_POST['password'])) {
    $identifiant = $_POST['Identifiant'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($identifiant) || empty($password)) {
        die("Veuillez remplir tous les champs.");
    }

    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM CONNEXION_ENS WHERE login_ensConc = :identifiant");
    $stmt->execute(['identifiant' => $identifiant]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pass_ensConc'])) {
        // Authentification réussie
        session_start();
        $_SESSION['user_id'] = $user['id_ens'];
        header("Location: ../templates/ens/Candidatures.per.ens.php");
        exit;
    } else {
        die("Identifiant ou mot de passe incorrect.");
    }
} else {
    die("Méthode de requête non autorisée.");
}