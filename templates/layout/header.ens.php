<header>
        <nav>
            <section class="Profil-info-barre-navigation">
                <div class="Profil-info">
                    <i class="fa-solid fa-circle-user" style="font-size: 35px;"></i>
                    <div class="Profil-details">
                        <p class="Profil-nom"><?php echo htmlspecialchars($enseignant['nom_ens']); ?></p>
                        <p class="Profil-role">Enseignant <?php if($enseignant['AP_ens']) echo "AP"; ?></p>
                        <?php if($enseignant['AD_ens']) { ?>
                            <p class="Profil-role">Administrateur <i class="fa-solid fa-hammer"></i></p>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="balise-barre-navigation">
                <h2>Vue des Étudiant référant</h2>
                <ul>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/candidatures.per.ens.php" class="<?php echo ($title == 'Candidatures envoyées') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-inbox" style="color: #007bff;"></i> Candidatures envoyées</a></li>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/entrerpise.per.ens.php" class="<?php echo ($title == 'Entreprises contactées') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-building" style="color: #cb9433;"></i> Entreprises contactées</a></li>
                    <li><a href="#"><i class="fa-solid fa-address-book" style="color: #018f12;"></i> Annuaire de contacts</a></li>
                    <li><a href="#"><i class="fa-solid fa-square-up-right" style="color: #dc3545;"></i> Relances</a></li>
                </ul>
            </section>
            <section class="balise-barre-navigation">
                <h2>Vue Globale des classe</h2>
                <ul>
                    <li><a href="#"><i class="fa-solid fa-envelope"></i> Toutes les démarches</a></li>
                    <li><a href="#"><i class="fa-solid fa-bookmark"></i> Entreprises enregistrées</a></li>
                    <li><a href="#"><i class="fa-solid fa-book"></i> Annuaire des contacts</a></li>
                    <li><a href="#"><i class="fa-solid fa-square-up-right"></i> Relance globale</a></li>
                </ul>
            </section>
            <section class="balise-barre-navigation">
                <h2>Vue Administratifs / Réglage</h2>
                <ul>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/ad/edu.ad.php" class="<?php echo ($title == 'Étudiants') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-graduation-cap"></i> Étudiants</a></li>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/ad/ens.ad.php" class="<?php echo ($title == 'Enseignants') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-book-open-reader"></i> Enseignants</a></li>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/ad/classesGlobales.ad.php" class="<?php echo ($title == 'Classes Globales') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-users-line"></i> Classes Globales</a></li>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/ad/classifier.ad.php" class="<?php echo ($title == 'Classifier') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-folder-tree"></i> Classifier</a></li>
                    <li><a href="<?php echo URL_RACINE; ?>templates/ens/ad/classifier.ad.php" class="<?php echo ($title == 'Planification de stage') ? 'onglet-selectionne' : ''; ?>"><i class="fa-solid fa-scroll"></i> Planification de stage</a></li>
                </ul>
            </section>
            <section class="balise-barre-navigation">
                <h2>Informations & Réglage</h2>
                <ul>
                    <li><a href="#"><i class="fa-solid fa-circle-info"></i> Information de stage</a></li>
                    <li><a href="#"><i class="fa-solid fa-sliders"></i> Réglages</a></li>
                </ul>
            </section>
        </nav>
</header>