<?php

$id_etudiant = $_GET['id'];

$etudiant = getTarqueETUDIANT($db, $id_etudiant);
$appartients = getAppartientForETUDIANT($db, $id_etudiant);
$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);

$title = "Modifier Étudiant | " . $etudiant['nom_edu'] . " " . $etudiant['prenom_edu'];
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
        <form action="onglet.php?pages=info_modif.edu&id=<?php echo $_GET['id'] ?>" method="POST">
            
            <div class="balise-barre-navigation-contenu">
                <p class="badge-chemin-actuel">Modification > <?php echo htmlspecialchars($etudiant['nom_edu'] . " " . $etudiant['prenom_edu']); ?></p>
                <div class="balise-barre-navigation-information">
                    <h1><i class="fa-solid fa-graduation-cap"></i> <?php echo $title ?></h1>
                    
                    <button type="submit" name="sauvegarder" class="bouton-sauvegarder">
                        <i class="fa-solid fa-floppy-disk"></i> Enregistrer
                    </button>

                    <div class="message-container">
                        <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                            <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                        <?php } ?>
                        <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
                            <h3 class="message-success" ><i class="fa-solid fa-check"></i> Modification réussie</h3>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="section-contenue-info">
                <div class="contenue-info">
                    
                    <div class="colonne-info">
                        <h2><i class="fa-solid fa-user-graduate"></i> Profil général</h2>
                        
                        <div class="groupe-champ">
                            <label for="nom_edu">Nom*</label>
                            <input type="text" id="nom_edu" name="nom" class="champ-info-valeur" value="<?php echo htmlspecialchars($etudiant['nom_edu']); ?>" required>
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="prenom_edu">Prénom*</label>
                            <input type="text" id="prenom_edu" name="prenom" class="champ-info-valeur" value="<?php echo htmlspecialchars($etudiant['prenom_edu']); ?>" required>
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="status_edu">Statut / État</label>
                            <input type="text" id="status_edu" name="status_edu" class="champ-info-valeur input-badge-status " value="<?php echo $etudiant['status_edu'] ? htmlspecialchars($etudiant['status_edu']) : ''; ?>">
                        </div>
                    </div>

                    <div class="colonne-info">
                        <h2><i class="fa-solid fa-address-book"></i> Coordonnées</h2>
                        
                        <div class="groupe-champ">
                            <label for="mail_edu">Adresse Email</label>
                            <input type="email" id="mail_edu" name="mail" class="champ-info-valeur" value="<?php echo htmlspecialchars($etudiant['mail_edu'] ?? ''); ?>">
                        </div>
                        
                        <div class="groupe-champ">
                            <label for="num_phone_edu">Téléphone</label>
                            <input type="text" id="num_phone_edu" name="num_telephone" class="champ-info-valeur" value="<?php echo htmlspecialchars($etudiant['num_phone_edu'] ?? ''); ?>">
                        </div>

                        <div class="groupe-champ">
                            <label>Enseignant Référent (Non modifiable ici)</label>
                            <div class="champ-info-valeur champ-bloque">
                                <?php 
                                if($etudiant['id_ens']) {
                                    $ensRef = getTarqueENSEIGNANT($db, $etudiant['id_ens']);
                                    echo htmlspecialchars($ensRef['nom_ens']);
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
                                    $classeName = '-';
                                    if($appartient['id_cla']) {
                                        $classe = getETUDIANTForCLASSE($db, $appartient['id_cla']);
                                        $classeName = $classe['nom_cla'] ?? '-';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($appartient['annee_scolaire']) ?></td>
                                        <td><?php echo htmlspecialchars($classeName) ?></td> 
                                        <td><?php echo htmlspecialchars($appartient['option_edu']) ?></td>
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