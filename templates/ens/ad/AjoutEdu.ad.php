<?php
$title = "Étudiants";
$titleOnglet = "Ajouter un Étudiant";
$classes = getToutClASSE($db);
$annees_scolaires = getToutANNEE_SCOLAIRE($db);
$enseignants = getToutENSEIGNANT($db);
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
            <p class="badge-chemin-actuel">Vue Administratifs / Reglages > <a href="<?php echo URL_RACINE; ?>templates/ens/ad/edu.ad.php">Étudiants</a> > <?php echo $titleOnglet; ?></p>
            <div class="balise-barre-navigation-information">
                <h1><i class="fa-solid fa-pencil"></i> <?php echo $titleOnglet; ?></h1>

                <div class="message-container">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                        <h3 class="message-error" ><i class="fa-solid fa-xmark"></i> Erreur : <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Une erreur est survenue."; ?></h3>
                    <?php } ?>
                    <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
                        <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout réussie, <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ""; ?></h3>
                    <?php } ?>
                    <?php if(isset($_GET['success']) && $_GET['success'] == 2) { ?>
                        <h3 class="message-success" ><i class="fa-solid fa-check"></i> Ajout et association on réussis, <?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ""; ?></h3>
                    <?php } ?>

                </div>
            </div>
        </div>

        <a href="javascript:history.back()" class="bouton-retour">
            <i class="fa-solid fa-arrow-left"></i> Retour
        </a>

        <div class="formulaire-ajout-classe">
            
            <form action="enseignants.php?pages=etudiands.ad.ens&sousPages=ajout.edu.ad" method="POST">
                <div class="formulaire-ajout-classe-contenu">
                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="nom">Nom* :</label>
                            <input type="text" id="nom" name="nom" required placeholder="Ex: doe">
                        </div>
                        <div class="groupe-champ">
                            <label for="prenom">Prénom* :</label>
                            <input type="text" id="prenom" name="prenom" required placeholder="Ex: John">
                        </div>
                    </div>

                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="mail">Mail :</label>
                            <input type="email" id="mail" name="mail" placeholder="Ex: john.doe@example.com">
                        </div>
                        <div class="groupe-champ">
                            <label for="num_telephone">Numéro de téléphone :</label>
                            <input type="text" id="num_telephone" name="num_telephone" placeholder="Ex: 06 12 34 56 78">
                        </div>
                    </div>

                    <div class="colonne-formulaire aligne-bouton">
                        <div class="groupe-champ">
                            <label for="enseignant_referent">Enseignant référent :</label>
                            <select name="enseignant_referent" id="enseignant_referent" >
                                <option value="">-- Choisir référent --</option>
                                <?php foreach($enseignants as $enseignant) { ?>
                                    <option value="<?php echo htmlspecialchars($enseignant['id_ens']); ?>">
                                        <?php echo htmlspecialchars($enseignant['nom_ens']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="action_ajouter_seul" class="bouton-ajouter">
                            <i class="fa-solid fa-user-plus"></i> Ajouter
                        </button>
                    </div>
                </div> 
            </form>

            <hr class="separateur-formulaire">

            <form action="<?php echo URL_RACINE; ?>enseignants.php?pages=etudiands.ad.ens&sousPages=ajout.edu.ad" method="POST" id="form-association">
                
                <div style="display:none;">
                    <input type="hidden" name="nom" id="hidden_nom" required>
                    <input type="hidden" name="prenom" id="hidden_prenom" required>
                    <input type="hidden" name="mail" id="hidden_mail">
                    <input type="hidden" name="num_telephone" id="hidden_num_telephone">
                    <input type="hidden" name="enseignant_referent" id="hidden_enseignant_referent">
                </div>

                <div class="formulaire-ajout-classe-contenu">
                    <div class="colonne-formulaire">
                        <div class="groupe-champ">
                            <label for="classe_etud">Classe* :</label>
                            <select name="classe_etud" id="classe_etud" required>
                                <option value="">-- Choisir une classe --</option>
                                <?php foreach($classes as $classe) { ?>
                                    <option value="<?php echo htmlspecialchars($classe['id_cla']); ?>">
                                        <?php echo htmlspecialchars($classe['nom_cla']); ?>
                                    </option>
                                <?php } ?>
                            </select>
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
                            <label for="option_etud">Option :</label>
                            <input type="text" id="option_etud" name="option_etud" placeholder="Ex: SLAM">
                        </div>
                    </div>

                    <div class="colonne-formulaire aligne-bouton-seul">
                        <button type="submit" name="action_ajouter_associer" class="bouton-ajouter bouton-associer">
                            <i class="fa-solid fa-pen-to-square"></i> Ajouter & l'associer
                        </button>
                    </div>
                </div>
            </form>
            
        </div>

        <script>
            // 1. Recopie des données en temps réel du haut vers le bas
            document.getElementById('nom').addEventListener('input', e => document.getElementById('hidden_nom').value = e.target.value);
            document.getElementById('prenom').addEventListener('input', e => document.getElementById('hidden_prenom').value = e.target.value);
            document.getElementById('mail').addEventListener('input', e => document.getElementById('hidden_mail').value = e.target.value);
            document.getElementById('num_telephone').addEventListener('input', e => document.getElementById('hidden_num_telephone').value = e.target.value);
            document.getElementById('enseignant_referent').addEventListener('input', e => document.getElementById('hidden_enseignant_referent').value = e.target.value);

            // 2. Blocage du second formulaire si le premier est vide
            document.getElementById('form-association').addEventListener('submit', function(e) {
                const nomCache = document.getElementById('hidden_nom').value.trim();
                const prenomCache = document.getElementById('hidden_prenom').value.trim();

                if (nomCache === "" || prenomCache === "") {
                    e.preventDefault(); // Stoppe l'envoi SQL
                    alert("⚠️ Impossible de valider : Vous devez d'abord remplir le Nom et le Prénom de l'étudiant en haut de la page !");
                    document.getElementById('nom').focus(); // Remonte l'utilisateur au champ Nom
                }
            });
        </script>
    </main>
</body>
</html>