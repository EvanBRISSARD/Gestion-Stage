<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Enseignant</title>
    <link rel="icon" type="image/png" href="<?php echo URL_RACINE; ?>images/LogoGS64x64.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URL_RACINE; ?>css/style.css">
</head>
<body>
    <main>
        <div class="connextion-container">
            <h1>Connexion Enseignant</h1>
            
            <?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
                <p style="color: red; font-weight: bold; text-align: center;">
                    <i class="fa-solid fa-xmark"></i> Identifiant ou mot de passe incorrect.
                </p>
            <?php } ?>

            <form action="tableau_de_bord.php?pages=connextionEns" method="post" class="connextion-form">
                <label for="Identifiant">Identifiant :</label>
                <input type="text" id="Identifiant" name="Identifiant" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="bouton-connextion">Se connecter</button>
            </form>
        </div>
    </main>
</body>
</html>