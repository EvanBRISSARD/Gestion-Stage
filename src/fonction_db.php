<?php 

function getTarqueENSEIGNANT($db, $id) {
    try {
        $requete = $db->prepare("SELECT nom_ens, mail_ens, AP_ens, AD_ens FROM ENSEIGNANT WHERE id_ens = :id;");
        $requete->execute(['id' => $id]);
        $result = $requete->fetch();
        return $result ?: false;
        
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return false;
    }
}

function getTarqueETUDIANT($db, $id) {
    try {
        $requete = $db->prepare("SELECT id_edu, nom_edu, prenom_edu, mail_edu, num_phone_edu, status_edu, id_ens FROM ETUDIANT WHERE id_edu = :id;");
        $requete->execute(['id' => $id]);
        $result = $requete->fetch();
        return $result ?: false;
        
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return false;
    }
}

function getToutEtudiants($db) {
    try {
        $requete = $db->query("SELECT id, entreprise_id, date_envoi, mode_contact, statut, resultat FROM candidatures ORDER BY date_envoi DESC ;");
        return $requete->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return [];
    }
}

function getToutClASSE($db) {
    try {
        $requete = $db->query("SELECT id_cla, nom_cla FROM CLASSE ORDER BY id_cla DESC;");
        return $requete->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return [];
    }
}

function getToutANNEE_SCOLAIRE($db) {
    try {
        $requete = $db->query("SELECT annee_scolaire FROM ANNEE_SCOLAIRE ORDER BY annee_scolaire DESC;");
        return $requete->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return [];
    }
}

function getToutETUDIANT($db) {
    try {
        $requete = $db->query("SELECT id_edu, nom_edu, prenom_edu, mail_edu, num_phone_edu, id_ens FROM ETUDIANT ORDER BY nom_edu ASC;");
        return $requete->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return [];
    }
}

function getToutENSEIGNANT($db) {
    try {
        $requete = $db->query("SELECT id_ens, nom_ens, mail_ens, AP_ens, AD_ens FROM ENSEIGNANT ORDER BY nom_ens ASC ;");
        return $requete->fetchAll();
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return [];
    }
}

function getAppartientForETUDIANT($db, $id) {
    try {
        $requete = $db->prepare("SELECT id_edu, id_cla, annee_scolaire, option_edu FROM appartient WHERE id_edu = :id ORDER BY annee_scolaire DESC;");
        $requete->execute(['id' => $id]);
        $result = $requete->fetchAll();
        return $result ?: false;
        
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return false;
    }
}

function getETUDIANTForCLASSE($db, $id) {
    try {
        $requete = $db->prepare("SELECT id_cla, nom_cla FROM CLASSE WHERE id_cla = :id;");
        $requete->execute(['id' => $id]);
        $result = $requete->fetch();
        return $result ?: false;
        
    } catch (PDOException $e) {
        error_log("Erreur SQL : " . $e->getMessage());
        return false;
    }
}