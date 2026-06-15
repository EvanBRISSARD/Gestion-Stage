<?php
$db = getPDO();
$etudiant = getTarqueETUDIANT($db, $_GET['id']);
$appartients = getAppartientForETUDIANT($db, $_GET['id']);

$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);
$title = "Étudiant | " . $etudiant['nom_edu'] . " " . $etudiant['prenom_edu'];
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
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; // Inclusion de l'en-tête?>

    <main>
        <div class="balise-barre-navigation-contenu">
            <p class="badge-chemin-actuel">Vue information > <?php echo $title; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-graduation-cap"></i> <?php echo $title; ?></h1>
                <a href="<?php echo URL_RACINE; ?>templates/ens/ad/AjoutEdu.ad.php" class="bouton-ajouter"><i class="fa-solid fa-pen-ruler"></i> Modifier</a>
            </div>
        </div>
        <div class="section-contenue-info">
            <div class="contenue-info">
                
                <div class="colonne-info">
                    <h2><i class="fa-solid fa-user-graduate"></i> Profil général</h2>
                    
                    <div class="groupe-champ">
                        <label>Nom</label>
                        <div class="champ-info-valeur"><?php echo htmlspecialchars($etudiant['nom_edu']); ?></div>
                    </div>
                    
                    <div class="groupe-champ">
                        <label>Prénom</label>
                        <div class="champ-info-valeur"><?php echo htmlspecialchars($etudiant['prenom_edu']); ?></div>
                    </div>
                    
                    <div class="groupe-champ">
                        <label>Statut / État</label>
                        <div class="champ-info-valeur badge-status"><?php echo $etudiant['status_edu'] ? htmlspecialchars($etudiant['status_edu']) : 'Non défini'; ?></div>
                    </div>
                </div>

                <div class="colonne-info">
                    <h2><i class="fa-solid fa-address-book"></i> Coordonnées</h2>
                    
                    <div class="groupe-champ">
                        <label>Adresse Email</label>
                        <div class="champ-info-valeur">
                            <?php if ($etudiant['mail_edu']): ?>
                                <a href="mailto:<?php echo htmlspecialchars($etudiant['mail_edu']); ?>"><?php echo htmlspecialchars($etudiant['mail_edu']); ?></a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="groupe-champ">
                        <label>Téléphone</label>
                        <div class="champ-info-valeur">
                            <?php if ($etudiant['num_phone_edu']): ?>
                                <a href="tel:<?php echo htmlspecialchars($etudiant['num_phone_edu']); ?>"><?php echo htmlspecialchars($etudiant['num_phone_edu']); ?></a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="groupe-champ">
                        <label>Enseignant Référent</label>
                        <div class="champ-info-valeur">
                            <?php 
                            if($etudiant['id_ens']) {
                                $ensRef = getTarqueENSEIGNANT($db, $etudiant['id_ens']);
                                echo '<div>' . $ensRef['nom_ens'] . '</div>';
                            } else {
                                 echo '-';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navigation-container zone-scrollable-tableau">
                <table class="mon-tableau-navigation">
                    <thead>
                        <tr>
                            <th>Année scolaire</th>
                            <th>Classe</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(empty($appartients)) {
                            echo "<tr><td colspan='3'>Aucune association enregistrée.</td></tr>";
                        } else {
                            foreach ($appartients as $appartient) { 
                                if($appartient['id_cla']) {
                                    $classe = getETUDIANTForCLASSE($db,$appartient['id_cla']);
                                } else {
                                    $classe = '-';
                                }
                                
                                ?>
                                <tr >
                                    <td><?php echo htmlspecialchars($appartient['annee_scolaire']) ?></td>
                                    <td><?php echo htmlspecialchars($classe['nom_cla']) ?></td> 
                                    <td><?php echo htmlspecialchars($appartient['option_edu']) ?></td>
                                </tr>
                            <?php } 
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>