<?php
session_start();
require_once __DIR__ . '/../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

$page = $_GET['pages'] ?? 'candidatures';

switch ($page) {
    case 'commentSeConnecter':
        require_once CHEMIN_RACINE . 'templates/visi/CommentConnextion.php';
        break;

    case 'connextionEns':
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            require_once CHEMIN_RACINE . 'src/trait/ens/connextionEns.trait.php';
        }
           

        require_once CHEMIN_RACINE . 'templates/visi/Connextion.ens.php';
        break;

    default:
        // Si la page demandée n'existe pas, on peut afficher une erreur ou rediriger
        echo "Désolé, cette page n'existe pas.";
        break;
}
