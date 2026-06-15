<?php
session_start();

require_once __DIR__ . '/../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';
require_once CHEMIN_RACINE . 'src/fonction_db.php';

$db = getPDO();

$enseignant = getTarqueENSEIGNANT($db, $_SESSION['user_id']);
$title = "Étudiants";

$etudiants = getToutETUDIANT($db);

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
                <h1><i class="fa-solid fa-graduation-cap"></i> <?php echo $title; ?></h1>
                <p><i class="fa-solid fa-user"></i> <?php echo count($etudiants); ?> Etudiants total</p>
                <a href="<?php echo URL_RACINE; ?>templates/ens/ad/AjoutEdu.ad.php" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter un Étudiant</a>
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
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Mail</th>
                            <th>Numéro de Téléphone</th>
                            <th>Enseignant Référent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(empty($etudiants)) {
                            echo "<tr><td colspan='6'>Aucune inscription d'étudiant enregistrée.</td></tr>";
                        } else {
                            foreach ($etudiants as $etudiant) {
                                $ensRef = ($etudiant['id_ens'] == null) ? '-' : htmlspecialchars(getTarqueENSEIGNANT($db, $etudiant['id_ens'])['nom_ens']);
                                $mail = ($etudiant['mail_edu'] == null) ? '-' : htmlspecialchars($etudiant['mail_edu']);
                                $num_phone = ($etudiant['num_phone_edu'] == null) ? '-' : htmlspecialchars($etudiant['num_phone_edu']);
                                ?>
                                
                                <tr class="tr-clickable" onclick="window.location.href='<?php echo URL_RACINE ?>templates/onglet/info_edu.php?id=<?php echo $etudiant['id_edu']; ?>'">
                                    <td><?php echo htmlspecialchars($etudiant['nom_edu']) ?></td> 
                                    <td><?php echo htmlspecialchars($etudiant['prenom_edu']) ?></td>
                                    <td><?php echo $mail ?></td>
                                    <td><?php echo $num_phone ?></td>
                                    <td><?php echo $ensRef ?></td>
                                    <td onclick="event.stopPropagation();">
                                        <a href="<?php echo URL_RACINE ?>src/trait/ens/ad/SupEdu.trait.php?id_edu=<?php echo urlencode($etudiant['id_edu']) ?>" 
                                        class="bouton-supprimer" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
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