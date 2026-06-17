# 🎓 Gestion-stages

![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![MVC](https://img.shields.io/badge/Architecture-MVC-2ea44f?style=for-the-badge)
![Docker](https://img.shields.io/badge/Docker-Containerized-2496ED?style=for-the-badge\&logo=docker\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)

---

## 📌 À propos du projet

**Gestion-stages** est une application web de gestion de stages permettant de centraliser et structurer l’ensemble du processus de stage pour les étudiants, enseignants et entreprises.

Le système facilite :

* la gestion des étudiants et de leurs dossiers
* le suivi des offres et candidatures de stage
* l’organisation des enseignants et référents
* la centralisation des informations liées aux stages

Le projet est développé en **PHP** avec une architecture **MVC**, et déployé via **Docker** pour garantir un environnement reproductible.

---

## 🚀 Fonctionnalités

### 👨‍🎓 Gestion des étudiants

* Création et suivi des profils étudiants
* Consultation des informations et historiques

### 🏢 Gestion des entreprises

* Ajout et organisation des entreprises partenaires
* Gestion des contacts et informations utiles

### 📄 Gestion des stages

* Suivi des candidatures
* Association étudiant ↔ entreprise ↔ enseignant
* Organisation des périodes de stage

### 👨‍🏫 Gestion des enseignants

* Attribution des suivis de stage
* Supervision des étudiants

### 🔐 Sécurité & architecture

* Architecture MVC structurée
* Validation des données utilisateurs
* Protection contre les injections SQL
* Centralisation des accès base de données

---

## 🛠️ Technologies utilisées

* 💻 **Backend** : PHP 8+ (MVC)
* 🌐 **Frontend** : HTML5 / CSS3
* 🗄️ **Base de données** : MySQL / MariaDB
* 🐳 **Conteneurisation** : Docker & Docker Compose
* ⚙️ **Serveur** : Apache
* 🧪 **Outils** : Git / DataGrip / VS Code

---

## 📁 Architecture du projet

```bash id="projarch1"
📦 Gestion-Stage
├── config/          # Configuration DB & variables globales
├── public/          # Pages accessibles (interface utilisateur)
├── src/             # Logique métier (MVC - contrôleurs & services)
├── templates/       # Vues organisées par modules
├── docker-compose.yml
├── .env
└── README.md
```

---

## ⚙️ Installation du projet

### 📌 Prérequis

* Docker & Docker Compose 🐳
* Git 🧑‍💻

---

### 📥 Cloner le projet

```bash id="clone1"
git clone https://github.com/EvanBRISSARD/Gestion-Stage
cd GestionStage
```

---

### 🚀 Lancer l’environnement

```bash id="run1"
docker compose up -d
```

---

### 🌍 Accès à l’application

* 🔗 Application web : `http://localhost:8080`
* 🗄️ Base de données : conteneur MySQL/MariaDB

---

## 🔐 Sécurité

Le projet intègre plusieurs principes de sécurité :

* 🧱 Architecture MVC pour séparer logique et affichage
* ✅ Validation et contrôle des entrées utilisateurs
* 🔒 Protection contre les injections SQL
* ⚙️ Gestion centralisée de la configuration

---

## 🎯 Objectif du projet

Ce projet a été réalisé dans un cadre pédagogique afin de :

* Comprendre et appliquer l’architecture MVC
* Développer une application web complète de gestion de stages
* Mettre en place un environnement Dockerisé
* Structurer une base de données relationnelle

---

## 👨‍💻 Auteur

Projet réalisé dans le cadre d’une formation en développement web.

---

⭐ Si ce projet t’a aidé ou t’intéresse, n’hésite pas à lui donner une étoile !
