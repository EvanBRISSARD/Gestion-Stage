<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Etudiants</title>
    <link rel="icon" type="image/png" href="<?php echo URL_RACINE; ?>images/Logo-Ar.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>css/style_connextion_glo_visit.css">
</head>
<body>
    <main>
        <div class="connextion-container">
            
            <h1>Connexion Etudiants</h1>
            
            <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
                <div class="message-container msg-erreur-connexion">
                    <h3 class="message-error">
                        <i class="fa-solid fa-circle-exclamation"></i> Identifiant ou mot de passe incorrect.
                    </h3>
                </div>
            <?php } ?>

            <form action="tableau_de_bord.php?pages=connextionEns" method="post" class="connextion-form">
                
                <div class="form-group">
                    <label for="Identifiant">Identifiant</label>
                    <div class="input-group">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" id="Identifiant" name="Identifiant" placeholder="Ex : @durand" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-group">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="bouton-connextion">
                    Se connecter <i class="fa-solid fa-right-to-bracket"></i>
                </button>
                <a href="javascript:history.back()" class="bouton-retour">
                    <i class="fa-solid fa-arrow-left"></i> Retour
                </a>
            </form>
        </div>
    </main>
</body>
</html>