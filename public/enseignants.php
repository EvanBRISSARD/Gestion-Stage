<?php
session_start();

require_once __DIR__ . '/../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';
require_once CHEMIN_RACINE . 'src/fonction_db.php';

$page = $_GET['pages'] ?? 'candidatures.per.ens';
$sousPages = $_GET['sousPages'] ?? '';


switch ($page) {
    case 'candidatures.per.ens':
        require_once CHEMIN_RACINE . 'templates/ens/candidatures.per.ens.php';
        break;

    case 'entrerpise.per.ens':
        require_once CHEMIN_RACINE . 'templates/ens/entrerpise.per.ens.php';
        break;

    case 'etudiands.ad.ens': // ====== Section Pages AD/AP Étudiants
        if($sousPages == 'ajout.edu.ad'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_POST['nom']) || !isset($_POST['prenom']) || empty(trim($_POST['nom'])) || empty(trim($_POST['prenom']))) {
                    header("Location: " . URL_RACINE . "enseignants.php?pages=etudiands.ad.ens&sousPages=ajout.edu.ad&error=1&message=Veuillez remplir le nom et le prénom.");
                    exit;
                } else {
                    require_once CHEMIN_RACINE . 'src/trait/ens/ad/AjoutEdu.trait.php';
                }
            }
            else {
                require_once CHEMIN_RACINE . 'templates/ens/ad/AjoutEdu.ad.php';
                break;
            }
        }
        
        
        if(isset($_GET['id_edu'])){
            require_once CHEMIN_RACINE . 'src/trait/ens/ad/SupEdu.trait.php';
        }
        require_once CHEMIN_RACINE . 'templates/ens/ad/edu.ad.php';
        break;
    
    case 'enseignants.ad.ens': // ====== Section Pages AD/AP Enseignants
        if($sousPages == 'ajout.ens.ad'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!isset($_POST['nom']) || empty(trim($_POST['nom']))) {
                    header("Location: " . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad&error=1&message=Veuillez remplir le nom.");
                    exit;
                } else {
                    require_once CHEMIN_RACINE . 'src/trait/ens/ad/AjoutEns.trait.php';
                }
            } else {
                require_once CHEMIN_RACINE . 'templates/ens/ad/AjoutEns.ad.php';
                break;
            }
        }
        
        if(isset($_GET['id_ens'])){
            require_once CHEMIN_RACINE . 'src/trait/ens/ad/SupEns.trait.php';
        }
        require_once CHEMIN_RACINE . 'templates/ens/ad/ens.ad.php';
        break;

    case 'classesGloblas.ad.ens': 
        require_once CHEMIN_RACINE . 'templates/ens/ad/classesGlobales.ad.php';
        break;

    case 'classifier.ad.ens': // ====== Section Pages AD/AP Classifer
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(isset($_POST['nom_classe'])){
                if(empty(trim($_POST['nom_classe']))){
                    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=1&message=Veuillez remplir le nom de la classe.");
                } else {
                    require_once CHEMIN_RACINE . 'src/trait/ens/ad/AjoutClasse.trait.php';
                }
            }
            if(isset($_POST['annee_scolaire'])){
                if (empty($_POST['annee_scolaire'])){
                    header("Location: " . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&error=2&message=Veuillez remplir la case année scolaire.");
                } else {
                    require_once CHEMIN_RACINE . 'src/trait/ens/ad/AjoutAnnee.trait.php';
                }
            } 
            
        }

        if(isset($_GET['annee_scolaire'])){
            require_once CHEMIN_RACINE . 'src/trait/ens/ad/SupAnnee.trait.php';
        }

        if(isset($_GET['id_cla'])){
            require_once CHEMIN_RACINE . 'src/trait/ens/ad/SupClasse.trait.php';
        }

        require_once CHEMIN_RACINE . 'templates/ens/ad/classifier.ad.php';
        break;

    default:
        // Si la page n'existe pas
        echo "Désolé, cette page n'existe pas.";
        break;
}
