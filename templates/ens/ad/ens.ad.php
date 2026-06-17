<?php
$title = "Enseignants";
$enseignants = getToutENSEIGNANT($db);
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
                <h1><i class="fa-solid fa-book-open-reader"></i> <?php echo $title; ?></h1>
                <p><i class="fa-solid fa-user"></i> <?php echo count($enseignants); ?> Enseignant total</p>
                <a href="<?php echo URL_RACINE; ?>enseignants.php?pages=enseignants.ad.ens&sousPages=ajout.ens.ad" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter un Enseignant</a>
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
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>AP</th>
                            <th>AD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                            if(empty($enseignants)) {
                                echo "<tr><td colspan='6'>Aucune inscription d'étudiant enregistrée.</td></tr>";
                            } else {
                            foreach ($enseignants as $ens) {

                                if($ens['mail_ens'] == null ){
                                    $mail = '-';
                                } else {
                                    $mail = htmlspecialchars($ens['mail_ens']);
                                }

                                if($ens['AP_ens'] == null ){
                                    $ap = '-' ;
                                } else {
                                    $ap = '<i class="fa-solid fa-square-check"></i>' ;
                                }

                                if($ens['AD_ens'] == null ){
                                    $ad = '-' ;
                                } else {
                                    $ad = '<i class="fa-solid fa-square-check"></i>' ;
                                }

                                echo "<tr><td>" . htmlspecialchars($ens['id_ens']) . "</td> <td>" . htmlspecialchars($ens['nom_ens']) . "</td> <td>" . $mail . "</td> <td>" . $ap . "</td> <td>" . $ad . "</td> <td><a href='" . URL_RACINE . "enseignants.php?pages=enseignants.ad.ens&id_ens=" . urlencode($ens['id_ens']) . "' class='bouton-supprimer'><i class='fa-solid fa-trash'></i></a></td></tr>";
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>