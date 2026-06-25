<?php
session_start();

require_once __DIR__ . '/../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';
require_once CHEMIN_RACINE . 'src/fonction_db.php';

$db = getPDO();
$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);

$page = $_GET['pages'] ?? 'candidatures.per.ens';

switch ($page) {
    case 'info.edu':
        require_once CHEMIN_RACINE . 'templates/onglet/info_edu.php';
        break;

    case 'info_modif.edu':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isset($_POST['nom']) || !isset($_POST['prenom']) || empty(trim($_POST['nom'])) || empty(trim($_POST['prenom']))){
                header("Location: " . URL_RACINE . "onglet.php?pages=info_modif.edu&id=" . $_GET['id'] . "&error=1&message=Veuillez remplir le nom et le prénom.");
                exit;
            } else {
                require_once CHEMIN_RACINE . 'src/trait/onglet/info_modif_edu.trait.php';
            }
        }

        require_once CHEMIN_RACINE . 'templates/onglet/info_modif_edu.php';
        break;
    
    case 'réglage.ens':
        require_once CHEMIN_RACINE . 'templates/onglet/info_modif_ens.php';
        break;

    default:
        // Si la page n'existe pas
        echo "Désolé, cette page n'existe pas.";
        break;
}
