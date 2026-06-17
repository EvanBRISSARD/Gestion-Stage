<?php
$title = "Candidatures envoyées";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $enseignant['nom_ens']; ?> - <?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="images/Logo-Ar.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; // Inclusion de l'en-tête?>

    <main>
        <div class="balise-barre-navigation-contenu">
            <p class="badge-chemin-actuel">Vue des Étudiant référant > <?php echo $title; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-inbox"></i> <?php echo $title; ?></h1>
                <p><i class="fa-regular fa-comment"></i> 45 Démarches</p>
                <p><i class="fa-solid fa-comment-slash"></i> 18 Refusées</p>
                <p><i class="fa-regular fa-comment-dots"></i> 89 En attente</p>
                <a href="#" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter une démarche</a>
            </div>
            <div class="navigation-container zone-scrollable-tableau">
                <table class="mon-tableau-navigation">
                    <thead>
                        <tr>
                            <th>Date d'envoi</th>
                            <th>Heure d'envoi</th>
                            <th>Entreprise</th>
                            <th>Canal</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- C'est ici qu'il y aura tes nombreuses lignes de données -->
                        <tr><td>10/06/2026</td><td>14:00</td><td>Ananké</td><td>Mail</td><td>En attente</td></tr>
                        <!-- Duplique cette ligne plein de fois pour tester le scroll -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>