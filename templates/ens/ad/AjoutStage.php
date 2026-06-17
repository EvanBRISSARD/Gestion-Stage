<?php
$title = "Planification de stage";
$titleOnglet = "Ajouter une planification de stage";
$annees_scolaires = getToutANNEE_SCOLAIRE($db);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $enseignant['nom_ens']; ?> - <?php echo $titleOnglet; ?></title>
    <link rel="icon" type="image/png" href="images/Logo-Ar.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_from_ex.css">
</head>
<body>
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; // Inclusion de l'en-tête?>

    <main>
        <div class="balise-barre-navigation-contenu">
            <p class="badge-chemin-actuel">Vue Administratifs / Reglages > <a href="<?php echo URL_RACINE; ?>templates/ens/ad/ens.ad.php">Enseignants</a> > <?php echo $titleOnglet; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-pencil"></i> <?php echo $titleOnglet; ?></h1>

                <div class="message-container">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                        <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                    <?php } ?>
                    <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
                        <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie</h3>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <a href="javascript:history.back()" class="bouton-retour">
            <i class="fa-solid fa-arrow-left"></i> Retour
        </a>

        <div class="formulaire-ajout-classe">
            
            <form action="<?php echo URL_RACINE; ?>enseignants.php?pages=planificationStage.ad.ens&sousPages=ajoutStage.ad.ens" method="POST">
                <form action="<?php echo htmlspecialchars(URL_RACINE); ?>enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad" method="POST">
                <div class="formulaire-ajout-classe-contenu">
                    
                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="date_debut">Début* :</label>
                            <input type="date" id="date_debut" name="date_debut" required>
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="annee_scolaire_etud">Année scolaire* :</label>
                            <select name="annee_scolaire_etud" id="annee_scolaire_etud" required>
                                <option value="">-- Choisir une année --</option>
                                <?php foreach($annees_scolaires as $annee) { ?>
                                    <option value="<?php echo htmlspecialchars($annee['annee_scolaire']); ?>">
                                        <?php echo htmlspecialchars($annee['annee_scolaire']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="date_fin">Fin* :</label>
                            <input type="date" id="date_fin" name="date_fin" required>
                        </div>
                    </div>

                    <div class="colonne-formulaire aligne-bouton">
                        <div></div> 
                        <button type="submit" name="action_ajouter_associer" class="bouton-ajouter bouton-associer">
                            <i class="fa-solid fa-pen-to-square"></i> Ajouter
                        </button>
                    </div>

                </div> 
            </form>
        </div>
    </main>
</body>
</html>