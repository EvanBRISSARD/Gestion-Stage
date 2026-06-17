<?php
$classes = getToutClASSE($db);
$annees_scolaires = getToutANNEE_SCOLAIRE($db);
$title = "Classifier";
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
    <link rel="stylesheet" href="css/style_classifier_tap.css">
    <link rel="stylesheet" href="css/style_form_tab.css">
</head>
<body>
    <?php require_once CHEMIN_RACINE . 'templates/layout/header.ens.php'; // Inclusion de l'en-tête?>

    <main>
        <div class="balise-barre-navigation-contenu">
            <p class="badge-chemin-actuel">Vue Administratifs / Reglages > <?php echo $title; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-folder-tree"></i> <?php echo $title; ?></h1>
                
                <p><i class="fa-solid fa-chalkboard-user"></i> <?php echo count($classes); ?> Classes</p>
                <p><i class="fa-solid fa-calendar"></i> <?php echo count($annees_scolaires); ?> Années scolaires</p>

                <div class="message-container">
                                <!-- affichage des messages d'ajout de classe -->
                                <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
                                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie (classe)</h3>
                                <?php } ?>
                                <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                                    <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                                <?php } ?>
                                <!-- affichage des messages de suppression de classe -->
                                <?php if(isset($_GET['success']) && $_GET['success'] == 3) { ?>
                                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Suppression réussie (classe)</h3>
                                <?php } ?>
                                <?php if(isset($_GET['error']) && $_GET['error'] == 3) { ?>
                                    <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                                <?php } ?>

                                    <!-- affichage des messages d'ajout de classe -->
                                <?php if(isset($_GET['success']) && $_GET['success'] == 2) { ?>
                                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie (année scolaire)</h3>
                                <?php } ?>
                                <?php if(isset($_GET['error']) && $_GET['error'] == 2) { ?>
                                    <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                                <?php } ?>
                                <!-- affichage des messages de suppression de classe -->
                                <?php if(isset($_GET['success']) && $_GET['success'] == 4) { ?>
                                    <h3 class="message-success" ><i class="fa-solid fa-check"></i> Suppression réussie (année scolaire)</h3>
                                <?php } ?>
                                <?php if(isset($_GET['error']) && $_GET['error'] == 4) { ?>
                                    <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                                <?php } ?>
                </div>
                
            </div>

            <div class="container-classifier">
                <div class="container-classifier-Classe"> <!-- Partie pour la gestion des classes -->
                    <div class="container-classifier-Classe-header">
                        <h2><i class="fa-solid fa-chalkboard-user"></i> Classe</h2>

                        <div class="formulaire-ajout-classe">
                            <form action="<?php echo URL_RACINE; ?>enseignants.php?pages=classifier.ad.ens" method="POST">
                                <label for="nom_classe">Nom de la classe :</label>
                                <input type="text" id="nom_classe" name="nom_classe" required placeholder="Ex: BTS SIO1">

                                <button type="submit" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter une classe</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="navigation-container zone-scrollable-tableau">
                        <table class="mon-tableau-navigation">
                            <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom de la classe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(empty($classes)) {
                                    echo "<tr><td colspan='3'>Aucune classe trouvée.</td></tr>";
                                } else {
                                foreach ($classes as $classe) {
                                    echo "<tr><td>" . htmlspecialchars($classe['id_cla']) . "</td><td>" . htmlspecialchars($classe['nom_cla']) . "</td><td><a href='" . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&id_cla=" . $classe['id_cla'] . "' class='bouton-supprimer'><i class='fa-solid fa-trash'></i></a></td></tr>";
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="container-classifier-Année-Scolaire"> <!-- Partie pour la gestion des années scolaires -->
                    <h2><i class="fa-solid fa-calendar"></i> Année scolaire</h2>

                    <div class="formulaire-ajout-classe">
                        <form action="<?php echo URL_RACINE; ?>enseignants.php?pages=classifier.ad.ens" method="POST">
                            <label for="annee_scolaire">Année scolaire :</label>
                            <input type="text" id="annee_scolaire" name="annee_scolaire" required placeholder="Ex: 2025-2026">

                            <button type="submit" class="bouton-ajouter"><i class="fa-solid fa-plus"></i> Ajouter l'année scolaire</button>
                        </form>
                    </div>
                    <br>
                    <div class="navigation-container zone-scrollable-tableau">
                        <table class="mon-tableau-navigation">
                            <thead>
                                <tr>
                                    <th>Année scolaire</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(empty($annees_scolaires)) {
                                    echo "<tr><td colspan='2'>Aucune année scolaire trouvée.</td></tr>";
                                } else {
                                foreach ($annees_scolaires as $annee) {
                                    echo "<tr><td>" . htmlspecialchars($annee['annee_scolaire']) . "</td><td><a href='" . URL_RACINE . "enseignants.php?pages=classifier.ad.ens&annee_scolaire=" . urlencode($annee['annee_scolaire']) . "' class='bouton-supprimer'><i class='fa-solid fa-trash'></i></a></td></tr>";
                                }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>