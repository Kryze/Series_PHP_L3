# ShowTracker

Projet de programmation web/web dynamique de L3 MIAGE

Réalisation d'un site de recherche et recommandation de séries télévisées

# Fonctionnalités

- Le site permet de rechercher des séries et de consulter leurs  informations.

- Le  site  permet de  se  connecter  et d’indiquer les épisodes des séries que l’on a visionnés.

- Le site permet de recevoir des recommandations.

# Installation

## Pré-requis

 1. Réinstaller composer en version php7.0.10

 2. Allez dans le dossier www\Series_PHP_L3
  
 3. Ajouter C:\wamp64\bin\php\php7.0.10 a la variable PATH d'environnement (Si c'est pas wamp le dossier ou se trouve php7.0.10)

## Tutoriel

Ce tutoriel utilise wampserver64 et github desktop (pour pull le projet)

Démarche a suivre : 

1. Récuperer le projet
2. Supprimer composer.lock
3. Utiliser composer install
4. Modifier le fichier `HtmlServiceProvider` et remplacer les 2 occurences de `bindshared` en `singleton`
5. Renommer avec la console `.env.example` en `.env` (Sous windows : `move .env.example .env`) (Sous linux `mv .env.example .env`)
6. Utiliser les commandes `php artisan key:generate` et `php artisan config:clear`

Pour la base de données il faut ajouter :

- Une colonne salt à la table users (varchar(10))
- Changer la taille max de password a au moins 120
