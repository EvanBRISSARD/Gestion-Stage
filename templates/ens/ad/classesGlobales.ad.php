<?php
session_start();

require_once __DIR__ . '/../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';
require_once CHEMIN_RACINE . 'src/fonction_db.php';

$db = getPDO();

$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);
$title = "Classes Globales";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $enseignant['nom_ens']; ?> - <?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="<?php echo URL_RACINE; ?>public/images/Logo-Ar.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>public/css/style.css">
</head>
<body>
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; // Inclusion de l'en-tête?>

    <main>
        <div class="balise-barre-navigation-contenu">
            <p class="badge-chemin-actuel">Vue Administratifs / Reglages > <?php echo $title; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-users-line"></i> <?php echo $title; ?></h1>
                
                <p><i class="fa-solid fa-user"></i> 45 Etudiants total</p>
                <p><i class="fa-solid fa-calendar"></i> 2025-2026</p>
                
                <a href="<?php echo URL_RACINE; ?>templates/ens/ad/classifier.ad.php" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter une Classe / Année scolaire</a>
            </div>
            <div class="message-container">
                <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie (année scolaire)</h3>
                <?php } ?>
                 <?php if(isset($_GET['success']) && $_GET['success'] == 2) { ?>
                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie (classe)</h3>
                <?php } ?>
            </div>
            <div class="navigation-container zone-scrollable-tableau">
                <table class="mon-tableau-navigation">
                    <thead>
                        <tr>
                            <th>Année scolaire</th>
                            <th>Classe assignée</th>
                            <th>Total étudiants</th>
                            <th>Candidats enregistrés</th>
                            <th>Total acceptés</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- C'est ici qu'il y aura tes nombreuses lignes de données -->
                        <tr><td>2025-2026</td><td>BTS SIO1</td><td>25</td><td>46</td><td>5</td></tr>
                        <tr><td>2025-2026</td><td>BTS SIO2</td><td>27</td><td>57</td><td>9</td></tr>
                        <!-- Duplique cette ligne plein de fois pour tester le scroll -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>