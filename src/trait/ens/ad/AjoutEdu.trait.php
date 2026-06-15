<?php
require_once __DIR__ . '/../../../../config/url_racine.php';
require_once CHEMIN_RACINE . 'config/db.php';

if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    
    if (empty(trim($_POST['nom'])) || empty(trim($_POST['prenom']))) {
        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEdu.ad.php?error=1");
        exit();
    }

    $db = getPDO();

    $nom = mb_strtoupper(trim($_POST['nom']) , 'UTF-8');
    $prenom = trim($_POST['prenom']); 
    
    $mail = empty($_POST['mail']) ? null : trim($_POST['mail']);
    $num_telephone = empty($_POST['num_telephone']) ? null : trim($_POST['num_telephone']);
    
    $id_ens = empty($_POST['enseignant_referent']) ? null : trim($_POST['enseignant_referent']);; 

    $stmt = $db->prepare("INSERT INTO ETUDIANT (nom_edu, prenom_edu, mail_edu, num_phone_edu, id_ens) VALUES (:nom_edu, :prenom_edu, :mail_edu, :num_phone_edu, :id_ens);");
    
    try {
        $stmt->execute([
            ':nom_edu' => $nom,
            ':prenom_edu' => $prenom,
            ':mail_edu' => $mail,
            ':num_phone_edu' => $num_telephone,
            ':id_ens' => $id_ens
        ]);

        if(isset($_POST['action_ajouter_seul'])){
            // Redirection vers la page de succès
            header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEdu.ad.php?success=1"); 
            exit();
        }
        
        $id_edu_cree = $db->lastInsertId();

        $id_classe = $_POST['classe_etud'];
        $annee_scolaire = $_POST['annee_scolaire_etud'];
        $option_etud = empty($_POST['option_etud']) ? 'e/n' : trim($_POST['option_etud']);
 
        $stmtAssoc = $db->prepare("INSERT INTO appartient (id_edu, id_cla, annee_scolaire, option_edu) VALUES (:id_edu, :id_cla, :annee_scolaire, :option_edu);");
        
        $stmtAssoc->execute([
            ':id_edu' => $id_edu_cree,
            ':id_cla' => $id_classe,
            ':annee_scolaire' => $annee_scolaire,
            ':option_edu' => mb_strtoupper($option_etud, 'UTF-8')
        ]);

        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEdu.ad.php?success=2"); 
        exit();


    } catch(PDOException $e) {
        // En cas d'erreur SQL (ex: problème de clé étrangère ou table manquante)
        header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEdu.ad.php?error=1&message=" . urlencode($e->getMessage())); 
        exit();
    }

} else {
    header("Location: " . URL_RACINE . "templates/ens/ad/AjoutEdu.ad.php?error=1");
    exit();
}