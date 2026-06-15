<?php
session_start();

require_once __DIR__ . '/../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';
require_once CHEMIN_RACINE . 'src/fonction_db.php';

$page = $_GET['pages'] ?? 'candidatures.per.ens';

switch ($page) {
    case 'info.edu':
        require_once CHEMIN_RACINE . 'templates/onglet/info_edu.php';
        break;

    default:
        // Si la page n'existe pas
        echo "Désolé, cette page n'existe pas.";
        break;
}
