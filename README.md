# Démo application Symfony

Une démo d'une application web Symfony avec authentification, vérification de compte par email, login/logout et accès restreints aux ressources.

## Pré-requis

- Installer Docker+Compose;
- Installer Composer;
- Installer le gestionnaire de projet Symfony.

## Configuration

Vérifier les ports publiés pour les services (conteneurs) de postgresql et de mailpit et les adapter au besoin.

## Installer

Changer les ports situer à:
- compose.yaml

~~~bash
composer install
docker compose up -d
php bin/console doctrine:migrations:migrate
~~~

Autre commande utiles
~~~bash
php bin/console doctrine:migrations:execute --up DoctrineMigrations\Version20250424162117
~~~

## Lancer le projet

~~~bash
docker compose up -d
symfony server:start -d
~~~

## Arreter le projet

~~~bash
symfony server:stop
~~~

## Ressources utiles

- [Security](https://symfony.com/doc/current/security.html), point d'entrée de la doc Symfony sur la sécurisation des sites web;
- [Sending Emails with Mailer]( https://symfony.com/doc/current/mailer.html), documentation Symfony sur la configuration du service *mailer* (envoi de mail)
- [Flash Messages](https://symfony.com/doc/current/session.html#flash-messages), documentation Symfony sur les messages flash (des messages à n'afficher qu'une fois), utile pour afficher une notice après une redirection par exemple
- [Firewall](https://symfony.com/doc/current/security.html#the-firewall), documentation Symfony sur le concept de *firewall* (pare-feu). Un firewall définit les routes protégées par authentification et le mode d'authentification
- [Access control](https://symfony.com/doc/current/security.html#access-control-authorization), documentation Symfony sur la protection des ressources par authentification, role, etc.
- [Using Expressions in Security Access Controls](https://symfony.com/doc/current/security/expressions.html), documentation Symfony sur la possibilité d'appliquer des restrictions d'accès à des ressources utilisant de la logique custom via des expression