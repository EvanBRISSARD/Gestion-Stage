-- MariaDB dump 10.19-11.4.9-MariaDB, for Win64 (AMD64)
-- Database: gestionstage
-- ------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 1. TABLES INDÉPENDANTES (Niveau 0)

DROP TABLE IF EXISTS `annee_scolaire`;
CREATE TABLE `annee_scolaire` (
  `annee_scolaire` varchar(50) NOT NULL,
  PRIMARY KEY (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE `enseignant` (
  `id_ens` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ens` varchar(50) NOT NULL,
  `mail_ens` varchar(50) DEFAULT NULL,
  `AP_ens` tinyint(1) NOT NULL,
  `AD_ens` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_ens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE `entreprise` (
  `id_ent` int(11) NOT NULL AUTO_INCREMENT,
  `stan_num_phone_ent` varchar(20) DEFAULT NULL,
  `mail_ent` varchar(50) DEFAULT NULL,
  `siteweb_ent` varchar(50) DEFAULT NULL,
  `nom_ent` varchar(50) NOT NULL,
  `cp_ent` varchar(10) NOT NULL,
  `voie_ent` varchar(50) NOT NULL,
  `ville_ent` varchar(50) NOT NULL,
  `pays_ent` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


-- 2. TABLES AVEC DÉPENDANCES SIMPLES (Niveau 1)

DROP TABLE IF EXISTS `classe`;
CREATE TABLE `classe` (
  `id_cla` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cla` varchar(50) NOT NULL,
  `annee_scolaire` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cla`),
  KEY `annee_scolaire` (`annee_scolaire`),
  CONSTRAINT `fk_classe_annee` FOREIGN KEY (`annee_scolaire`) REFERENCES `annee_scolaire` (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `stage`;
CREATE TABLE `stage` (
  `id_sta` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_sta` date NOT NULL,
  `date_fin_sta` date NOT NULL,
  `annee_scolaire` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sta`),
  KEY `annee_scolaire` (`annee_scolaire`),
  CONSTRAINT `fk_stage_annee` FOREIGN KEY (`annee_scolaire`) REFERENCES `annee_scolaire` (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE `etudiant` (
  `id_edu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_edu` varchar(50) NOT NULL,
  `prenom_edu` varchar(50) NOT NULL,
  `mail_edu` varchar(50) DEFAULT NULL,
  `num_phone_edu` varchar(20) DEFAULT NULL,
  `status_edu` varchar(50) DEFAULT NULL,
  `id_ens` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_edu`),
  KEY `id_ens` (`id_ens`),
  CONSTRAINT `fk_etudiant_ens` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `contact_entreprise`;
CREATE TABLE `contact_entreprise` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cont` varchar(50) NOT NULL,
  `prenom_cont` varchar(50) DEFAULT NULL,
  `poste_cont` varchar(50) NOT NULL,
  `num_phone_cont` varchar(20) DEFAULT NULL,
  `mail_cont` varchar(50) DEFAULT NULL,
  `id_ent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cont`),
  KEY `id_ent` (`id_ent`),
  CONSTRAINT `fk_contact_ent` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `connexion_ens`;
CREATE TABLE `connexion_ens` (
  `login_ensConc` varchar(50) NOT NULL,
  `pass_ensConc` varchar(255) NOT NULL,
  `id_ens` int(11) NOT NULL,
  PRIMARY KEY (`login_ensConc`),
  KEY `id_ens` (`id_ens`),
  CONSTRAINT `fk_connexion_ens` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


-- 3. TABLES AVEC DÉPENDANCES MULTIPLES / DE LIAISON (Niveau 2)

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE `appartient` (
  `id_edu` int(11) NOT NULL,
  `id_cla` int(11) NOT NULL,
  `annee_scolaire` varchar(50) NOT NULL,
  `option_edu` varchar(10) NOT NULL,
  PRIMARY KEY (`id_edu`,`id_cla`,`annee_scolaire`),
  KEY `id_cla` (`id_cla`),
  KEY `annee_scolaire` (`annee_scolaire`),
  CONSTRAINT `fk_app_edu` FOREIGN KEY (`id_edu`) REFERENCES `etudiant` (`id_edu`) ON DELETE CASCADE,
  CONSTRAINT `fk_app_cla` FOREIGN KEY (`id_cla`) REFERENCES `classe` (`id_cla`),
  CONSTRAINT `fk_app_annee` FOREIGN KEY (`annee_scolaire`) REFERENCES `annee_scolaire` (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `connexion_edu`;
CREATE TABLE `connexion_edu` (
  `login_eduConc` varchar(50) NOT NULL,
  `pass_eduConc` varchar(255) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`login_eduConc`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `fk_connexion_edu` FOREIGN KEY (`id_edu`) REFERENCES `etudiant` (`id_edu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `type_doc` varchar(50) NOT NULL,
  `chemin_doc` varchar(255) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `fk_documents_edu` FOREIGN KEY (`id_edu`) REFERENCES `etudiant` (`id_edu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

DROP TABLE IF EXISTS `demarche`;
CREATE TABLE `demarche` (
  `id_dem` int(11) NOT NULL AUTO_INCREMENT,
  `date_cont` date NOT NULL,
  `heure_cont` time NOT NULL,
  `canal_cont` varchar(50) NOT NULL,
  `etat_cont` varchar(50) NOT NULL,
  `id_sta` int(11) NOT NULL,
  `id_cont` int(11) DEFAULT NULL,
  `id_ent` int(11) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`id_dem`),
  KEY `id_sta` (`id_sta`),
  KEY `id_cont` (`id_cont`),
  KEY `id_ent` (`id_ent`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `fk_demarche_sta` FOREIGN KEY (`id_sta`) REFERENCES `stage` (`id_sta`),
  CONSTRAINT `fk_demarche_cont` FOREIGN KEY (`id_cont`) REFERENCES `contact_entreprise` (`id_cont`),
  CONSTRAINT `fk_demarche_ent` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`),
  CONSTRAINT `fk_demarche_edu` FOREIGN KEY (`id_edu`) REFERENCES `etudiant` (`id_edu`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


-- 4. INSERTIONS DE DONNÉES

INSERT INTO `enseignant` (`nom_ens`, `mail_ens`, `AP_ens`, `AD_ens`)
VALUES ('root', NULL, 1, 1);

INSERT INTO `connexion_ens` (`login_ensConc`, `pass_ensConc`, `id_ens`)
VALUES ('@root', '$2y$10$aZkdADCsoCwcnoSFhL77rOZwTy2aseZbI9.xyagu7Gj.21TvB//Tu', LAST_INSERT_ID());

-- Restauration des paramètres
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;