<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connextion</title>
    <link rel="icon" type="image/png" href="../../public/images/LogoGS64x64.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <main>
        <div class="connextion-container">
            <h1>Connextion</h1>
            <form action="../../src/connextion.ens.php" method="post" class="connextion-form">
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