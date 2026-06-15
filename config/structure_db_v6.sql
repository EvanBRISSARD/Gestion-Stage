/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.4.9-MariaDB, for Win64 (AMD64)
--
-- Host: 192.168.1.111    Database: GestionStage
-- ------------------------------------------------------
-- Server version	11.8.6-MariaDB-0+deb13u1 from Debian

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `ANNEE_SCOLAIRE`
--

DROP TABLE IF EXISTS `ANNEE_SCOLAIRE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ANNEE_SCOLAIRE` (
  `annee_scolaire` varchar(50) NOT NULL,
  PRIMARY KEY (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `CLASSE`
--

DROP TABLE IF EXISTS `CLASSE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLASSE` (
  `id_cla` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cla` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cla`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `CONNEXION_EDU`
--

DROP TABLE IF EXISTS `CONNEXION_EDU`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `CONNEXION_EDU` (
  `login_eduConc` varchar(50) NOT NULL,
  `pass_eduConc` varchar(255) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`login_eduConc`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `CONNEXION_EDU_ibfk_1` FOREIGN KEY (`id_edu`) REFERENCES `ETUDIANT` (`id_edu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `CONNEXION_ENS`
--

DROP TABLE IF EXISTS `CONNEXION_ENS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `CONNEXION_ENS` (
  `login_ensConc` varchar(50) NOT NULL,
  `pass_ensConc` varchar(255) NOT NULL,
  `id_ens` int(11) NOT NULL,
  PRIMARY KEY (`login_ensConc`),
  KEY `id_ens` (`id_ens`),
  CONSTRAINT `CONNEXION_ENS_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `ENSEIGNANT` (`id_ens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `CONTACT_ENTREPRISE`
--

DROP TABLE IF EXISTS `CONTACT_ENTREPRISE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `CONTACT_ENTREPRISE` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cont` varchar(50) NOT NULL,
  `prenom_cont` varchar(50) DEFAULT NULL,
  `poste_cont` varchar(50) NOT NULL,
  `num_phone_cont` varchar(20) DEFAULT NULL,
  `mail_cont` varchar(50) DEFAULT NULL,
  `id_ent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cont`),
  KEY `id_ent` (`id_ent`),
  CONSTRAINT `CONTACT_ENTREPRISE_ibfk_1` FOREIGN KEY (`id_ent`) REFERENCES `ENTREPRISE` (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `DEMARCHE`
--

DROP TABLE IF EXISTS `DEMARCHE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `DEMARCHE` (
  `id_dem` int(11) NOT NULL AUTO_INCREMENT,
  `date_cont` date NOT NULL,
  `heure_cont` time NOT NULL,
  `canal_cont` varchar(50) NOT NULL,
  `etat_cont` varchar(50) NOT NULL,
  `id_cont` int(11) DEFAULT NULL,
  `id_ent` int(11) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`id_dem`),
  KEY `id_cont` (`id_cont`),
  KEY `id_ent` (`id_ent`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `DEMARCHE_ibfk_1` FOREIGN KEY (`id_cont`) REFERENCES `CONTACT_ENTREPRISE` (`id_cont`),
  CONSTRAINT `DEMARCHE_ibfk_2` FOREIGN KEY (`id_ent`) REFERENCES `ENTREPRISE` (`id_ent`),
  CONSTRAINT `DEMARCHE_ibfk_3` FOREIGN KEY (`id_edu`) REFERENCES `ETUDIANT` (`id_edu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `DOCUMENTS`
--

DROP TABLE IF EXISTS `DOCUMENTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `DOCUMENTS` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `type_doc` varchar(50) NOT NULL,
  `chemin_doc` varchar(255) NOT NULL,
  `id_edu` int(11) NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `id_edu` (`id_edu`),
  CONSTRAINT `DOCUMENTS_ibfk_1` FOREIGN KEY (`id_edu`) REFERENCES `ETUDIANT` (`id_edu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ENSEIGNANT`
--

DROP TABLE IF EXISTS `ENSEIGNANT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ENSEIGNANT` (
  `id_ens` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ens` varchar(50) NOT NULL,
  `mail_ens` varchar(50) DEFAULT NULL,
  `AP_ens` tinyint(1) NOT NULL,
  `AD_ens` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_ens`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ENTREPRISE`
--

DROP TABLE IF EXISTS `ENTREPRISE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ENTREPRISE` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ETUDIANT`
--

DROP TABLE IF EXISTS `ETUDIANT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `ETUDIANT` (
  `id_edu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_edu` varchar(50) NOT NULL,
  `prenom_edu` varchar(50) NOT NULL,
  `mail_edu` varchar(50) DEFAULT NULL,
  `num_phone_edu` varchar(20) DEFAULT NULL,
  `status_edu` varchar(50) DEFAULT NULL,
  `id_ens` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_edu`),
  KEY `id_ens` (`id_ens`),
  CONSTRAINT `ETUDIANT_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `ENSEIGNANT` (`id_ens`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `STAGE`
--

DROP TABLE IF EXISTS `STAGE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `STAGE` (
  `id_sta` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_sta` date NOT NULL,
  `date_fin_sta` date NOT NULL,
  `annee_scolaire` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sta`),
  KEY `annee_scolaire` (`annee_scolaire`),
  CONSTRAINT `STAGE_ibfk_1` FOREIGN KEY (`annee_scolaire`) REFERENCES `ANNEE_SCOLAIRE` (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `appartient` (
  `id_edu` int(11) NOT NULL,
  `id_cla` int(11) NOT NULL,
  `annee_scolaire` varchar(50) NOT NULL,
  `option_edu` varchar(10) NOT NULL,
  PRIMARY KEY (`id_edu`,`id_cla`,`annee_scolaire`),
  KEY `id_cla` (`id_cla`),
  KEY `annee_scolaire` (`annee_scolaire`),
  CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`id_edu`) REFERENCES `ETUDIANT` (`id_edu`),
  CONSTRAINT `appartient_ibfk_2` FOREIGN KEY (`id_cla`) REFERENCES `CLASSE` (`id_cla`),
  CONSTRAINT `appartient_ibfk_3` FOREIGN KEY (`annee_scolaire`) REFERENCES `ANNEE_SCOLAIRE` (`annee_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- 2. AJOUT DES IDENTIFIANTS LIÉS AU ROOT GRÂCE AU SELECT MAX

INSERT INTO ENSEIGNANT (nom_ens, mail_ens, AP_ens, AD_ens)
VALUES ('root', null, true, true);

INSERT INTO `CONNEXION_ENS` (`login_ensConc`, `pass_ensConc`, `id_ens`)
VALUES ('@root', '$2y$10$aZkdADCsoCwcnoSFhL77rOZwTy2aseZbI9.xyagu7Gj.21TvB//Tu', last_insert_id());


-- Dump completed on 2026-06-12  7:57:35