<?php
$title = "Planification de stage";
$stages = getToutSTAGE($db);
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
            <p class="badge-chemin-actuel">Vue Administratifs / Reglages > <?php echo $title; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-scroll"></i> <?php echo $title; ?></h1>
                <p><i class="fa-solid fa-user"></i> <?php echo count($stages); ?> Enseignant total</p>
                <a href="<?php echo URL_RACINE; ?>enseignants.php?pages=planificationStage.ad.ens&sousPages=ajoutStage.ad.ens" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter une planification</a>            </div>
                <div class="message-container">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 3) { ?>
                        <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                    <?php } ?>
                    <?php if(isset($_GET['success']) && $_GET['success'] == 3) { ?>
                        <h3 class="message-success" ><i class="fa-solid fa-check"></i> Suppression réussie</h3>
                    <?php } ?>
                </div>
            </div>
            
            <div class="navigation-container zone-scrollable-tableau">
                <table class="mon-tableau-navigation">
                    <thead>
                        <tr>
                            <th>Année scolaire</th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($stages)) {
                                echo "<tr><td colspan='4'>Aucune inscription de date de Stages.</td></tr>";
                            } else {
                            foreach ($stages as $stage) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($stage['annee_scolaire']) ?></td> 
                                    <td><?php echo formaterDateEnFrancais(htmlspecialchars($stage['date_debut_sta'])) ?></td> 
                                    <td><?php echo formaterDateEnFrancais(htmlspecialchars($stage['date_fin_sta'])) ?></td> 
                                    <td><a href="<?php echo URL_RACINE ?>enseignants.php?pages=planificationStage.ad.ens&id_sta=<?php echo urlencode($stage['id_sta']) ?>" class='bouton-supprimer'><i class='fa-solid fa-trash'></i></a></td>
                                </tr>
                        <?php }} ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>