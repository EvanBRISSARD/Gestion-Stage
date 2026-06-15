<?php
$db = getPDO();

$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);
$title = "Enseignants";
$titleOnglet = "Ajouter un Enseignant";

$classes = getToutClASSE($db);
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

        <div class="formulaire-ajout-classe">
            
            <form action="<?php echo URL_RACINE; ?>enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad" method="POST">
                <div class="formulaire-ajout-classe-contenu">
                    
                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="nom">Nom* :</label>
                            <input type="text" id="nom" name="nom" required placeholder="Ex: doe">
                        </div>
                        
                        <div class="groupe-champ">
                            <label>&nbsp;</label> <div class="groupe-champ-checkbox">
                                <input type="checkbox" id="ap_option" name="ap_option" value="1">
                                <label for="ap_option">Atelier de professionnalisation (AP)*</label>
                            </div>
                        </div>
                    </div>

                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="mail">Mail :</label>
                            <input type="email" id="mail" name="mail" placeholder="Ex: john.doe@example.com">
                        </div>
                        
                        <div class="groupe-champ">
                            <label>&nbsp;</label> <div class="groupe-champ-checkbox">
                                <input type="checkbox" id="ad_option" name="ad_option" value="1">
                                <label for="ad_option">Administrateur (AD)*</label>
                            </div>
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