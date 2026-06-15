<?php
require_once CHEMIN_RACINE . 'src/load_env.php';

function getPDO() {
    // On garde la connexion en mémoire pour ne pas la recréer
    static $pdo = null;

    if ($pdo === null) {
        $host = getenv('DB_HOST');
        $db   = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');

        // Petite vérification de sécurité
        if (!$host || !$db) {
            die("Erreur : Configuration de la base de données manquante.");
        }

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false, // Désactive l'émulation pour plus de sécurité
            ]);
        } catch (PDOException $e) {
            // On enregistre l'erreur dans un fichier log au lieu de l'afficher au public
            error_log($e->getMessage()); 
            die("Une erreur technique est survenue. Veuillez réessayer plus tard.");
        }
    }

    return $pdo;
}