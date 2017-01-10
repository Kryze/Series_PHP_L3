# ShowTracker

Projet de programmation web/web dynamique de L3 MIAGE

Réalisation d'un site de recherche et recommandation de séries télévisées

# Fonctionnalités

Le site permet de rechercher des séries et de consulter leurs  informations.

Le  site  permet de  se  connecter  et d’indiquer les épisodesdes séries que l’on a visionnés.

Le site permet de recevoir des recommandations.

# Installation

## Avant de suivre le tutoriel il faut

  Réinstaller composer en version php7.0.10

  Allez dans le dossier www\Series_PHP_L3
  
  Ajouter C:\wamp64\bin\php\php7.0.10 a la variable PATH d'environnement (Si c'est pas wamp le dossier ou se trouve php7.0.10)

## Tutoriel

J'utilise wampserver64 et github desktop (pour pull le projet)

Démarche a suivre : 

Récuperer le projet
Supprimer composer.lock
composer install

IL FAUT ENSUITE CHERCHER LE FICHIER HtmlServiceProvider et remplacer les 2 occurences de "bindshared" en "singleton" ( les mots entre guillemets )

Renommer en console .env.example en .env (Sous windows move .env.example .env) (Sous linux mv .env.example .env)

Utiliser les commandes php artisan key:generate

php artisan config:clear

NORMALEMENT CA MARCHE ENSUITE

// Pour le fonctionnement du salage

Il faut ajouter une colonne salt à la table users (varchar(10))
Et changer la taille max de password a minimum 120
