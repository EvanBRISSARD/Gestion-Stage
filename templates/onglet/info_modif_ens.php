<?php
$title = "Réglages";
$enseignant = getTarqueENSEIGNANT($db, $_GET['id']);
$etudiants = getToutETUDIANT_TarqueENSEIGNANT($db, $_GET['id'])
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $enseignant['nom_ens']; ?> - <?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="<?php echo URL_RACINE; ?>images/Logo-Ar.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>css/style_info.css">
</head>
<body>
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; ?>

    <main>
        <form action="" method="POST">
            
            <div class="balise-barre-navigation-contenu">
                <p class="badge-chemin-actuel">Modification > <?php echo htmlspecialchars($enseignant['nom_ens'])?></p>
                <div class="balise-barre-navigation-information">
                    <h1><i class="fa-solid fa-graduation-cap"></i> <?php echo htmlspecialchars($enseignant['nom_ens']); ?></h1>
                    
                    <button type="submit" name="sauvegarder" class="bouton-sauvegarder">
                        <i class="fa-solid fa-floppy-disk"></i> Enregistrer
                    </button>

                    <a href="<?php echo URL_RACINE; ?>onglet.php?pages=Sedéconnecter" class="bouton-ajouter"><i class="fa-solid fa-arrow-up-right-from-square"></i> Se déconnecter</a>
                </div>
            </div>

            <?php if (!empty($message)): ?>
                <div class="message-container" style="margin-bottom: 20px;">
                    <h3 class="message-<?php echo $message_type; ?>">
                        <i class="fa-solid <?php echo $message_type === 'success' ? 'fa-circle-check' : 'fa-circle-xmark'; ?>"></i> 
                        <?php echo $message; ?>
                    </h3>
                </div>
            <?php endif; ?>

            <div class="section-contenue-info">
                <div class="contenue-info">
                    
                    <div class="colonne-info">
                        <h2><i class="fa-solid fa-user-graduate"></i> Profil général</h2>
                        
                        <div class="groupe-champ">
                            <label for="nom_edu">Nom</label>
                            <input type="text" id="nom_edu" name="nom_edu" class="champ-info-valeur" value="<?php echo htmlspecialchars($enseignant['nom_ens']); ?>" required>
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="prenom_edu">AP</label>
                            <input type="text" id="prenom_edu" name="prenom_edu" class="champ-info-valeur" value="<?php echo htmlspecialchars($enseignant['AP_ens']); ?>" required>
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="prenom_edu">AD</label>
                            <input type="text" id="prenom_edu" name="prenom_edu" class="champ-info-valeur" value="<?php echo htmlspecialchars($enseignant['AD_ens']); ?>" required>
                        </div>
                    </div>

                    <div class="colonne-info">
                        <h2><i class="fa-solid fa-address-book"></i> Coordonnées</h2>
                        
                        <div class="groupe-champ">
                            <label for="mail_edu">Adresse Email</label>
                            <input type="email" id="mail_edu" name="mail_edu" class="champ-info-valeur" value="<?php echo htmlspecialchars($enseignant['mail_ens'] ?? ''); ?>">
                        </div>
                        
                    </div>
                </div>

                <div class="navigation-container zone-scrollable-tableau">
                    <table class="mon-tableau-navigation">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(empty($etudiants)) {
                                echo "<tr><td colspan='2'>Aucune inscription d'étudiant enregistrée.</td></tr>";
                            } else {
                                foreach ($etudiants as $etudiant) {?>
                                    <tr class="tr-clickable" onclick="window.location.href='<?php echo URL_RACINE ?>onglet.php?pages=info.edu&id=<?php echo $etudiant['id_edu']; ?>'">
                                        <td><?php echo htmlspecialchars($etudiant['nom_edu']) ?></td> 
                                        <td><?php echo htmlspecialchars($etudiant['prenom_edu']) ?></td>
                                    </tr>
                                <?php } 
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </main>
</body>
</html>