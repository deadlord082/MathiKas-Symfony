### Le but du projet

Notre projet consiste à développer la démo d'une application web Symfony avec authentification, vérification de compte par email, login/logout et accès restreints aux ressources. Nous avons choisi le sujet Content Management System (CMS).

## Table des matières
- [Équipe](#équipe)
- [Pré-requis](#pré-requis)
- [Modèle Conceptuel de données](#modèle-conceptuel-de-données)
- [Configuration](#configuration)
- [Installer](#installer)
- [Lancer le projet](#lancer-le-projet)
- [Remarques](#remarques)
- [Références](#références)

# Équipe

Notre équipe est composée de Lukas GABORIAU et Mathilde SIMON !

# Pré-requis

- Installer Docker+Compose;
- Installer Composer;
- Installer le gestionnaire de projet Symfony.

# Modèle Conceptuel de données
Le MCD de ce projet est simple, il contient simplement une table **user** et **article**.
- **user** : représente un utilisateur du site
- **article** : représente un article publié sur le site.

Un utilisateur peut avoir rédigé plusieurs ou aucun article et chaque article n'appartient qu'à un utilisateur !

![Schéma MCD](assets/mcd.svg)

# Configuration

Vous pouvez décider de l'emplacement de votre bdd dans le fichier .env.

Pour une bdd distante cloud :

~~~bash
DATABASE_URL="postgresql://neondb_owner:npg_N9hP2DfMLWVQ@ep-ancient-wind-a28evwjk.eu-central-1.aws.neon.tech/neondb?sslmode=require"
~~~

Pour une bdd dockerisée :

~~~bash
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:55555/app?serverVersion=16&charset=utf8"
~~~

En cas d'utilisation de Docker, changer les ports situé dans le fichier compose.yaml

# Installer

~~~bash
composer install
docker compose up -d
~~~

Commande pour migrer la bdd
~~~bash
php bin/console doctrine:migrations:migrate
~~~

# Lancer le projet

~~~bash
docker compose up -d
symfony server:start -d
~~~

# Remarques

Nous avons essayé de faire le second sujet mais n'avons pas réussi à le finir à temps,
c'est pour ça que si vous inspecter le projet vous risquer de trouver des modèles/controllers/vues non utilisé

# Références

- https://symfony.com/bundles/DoctrineMigrationsBundle/current/index.html
- https://twig.symfony.com/doc/3.x/tags/if.html