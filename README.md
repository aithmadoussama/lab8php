# 🎓 Application de Gestion des Étudiants – LAB8

## 📌 Description

Ce projet est une application web développée en **PHP** suivant une architecture **MVC (Model – View – Controller)**.  
Elle permet la gestion des étudiants avec un système d’authentification sécurisé.

### ✅ Fonctionnalités principales

- 🔐 Authentification (Login / Logout)
- 👨‍🎓 Gestion des étudiants (CRUD)
- 🏫 Gestion des filières
- 🛡️ Protection CSRF
- 🧭 Routage personnalisé
- 🗃️ Accès base de données via DAO
- 📝 Système de logs
- 🔎 Validation et sanitation des données

---

## 🏗️ Architecture du Projet

```
lab8/
│
├── public/              # Point d’entrée (index.php)
├── src/
│   ├── Container/       # Factory d’application
│   ├── Controller/      # Contrôleurs MVC
│   ├── Core/            # Router, Request, Response, View
│   ├── Dao/             # Accès base de données
│   └── Security/        # Auth, CSRF, Validator, Middleware
│
├── views/               # Fichiers de vues (PHP)
├── logs/                # Fichiers de logs
└── docs/                # Documentation
```

---

## ⚙️ Technologies Utilisées

- PHP (Programmation Orientée Objet)
- Architecture MVC personnalisée
- MySQL
- HTML / CSS
- Sécurité Web (CSRF, Validation, Middleware)

---

## 🚀 Installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/votre-utilisateur/lab8.git
```

### 2️⃣ Configurer la base de données

- Créer une base MySQL
- Modifier les paramètres de connexion dans :

```
src/Dao/DBConnection.php
```

### 3️⃣ Lancer le projet

- Placer le projet dans `htdocs` (XAMPP)  
  **OU**
- Configurer un Virtual Host

Point d’entrée :

```
public/index.php
```

Puis accéder via :

```
http://localhost/lab8/public
```

---

## 🔐 Authentification

Le système utilise :

- `Auth.php` → Gestion des sessions
- `Middleware.php` → Protection des routes
- `Csrf.php` → Protection contre les attaques CSRF

---

## 👨‍🎓 Module Étudiant (CRUD)

Le module permet :

- ➕ Ajouter un étudiant
- 📄 Afficher la liste
- ✏️ Modifier un étudiant
- ❌ Supprimer un étudiant
- 👁️ Voir les détails

Contrôleur principal :

```
src/Controller/EtudiantController.php
```

---

## 🛡️ Sécurité Implémentée

- Validation des données (`Validator.php`)
- Nettoyage des entrées (`Sanitizer.php`)
- Protection CSRF
- Middleware d’authentification
- Journalisation des actions (`Logger.php`)

---

## 📚 Structure Technique

### 🔄 Router
Le routeur personnalisé (`Core/Router.php`) gère :
- L’analyse des URLs
- L’appel des contrôleurs
- L’exécution des méthodes

### 🗄️ DAO
Chaque entité possède son propre DAO :
- `EtudiantDao.php`
- `FiliereDao.php`
- `AdminDao.php`

Ils encapsulent les requêtes SQL.

---

## 📄 Auteur

Projet réalisé dans le cadre du **LAB8**.

---

## 📌 Licence

Projet académique – Usage pédagogique.
