TodoList en DDD
===============

Ce projet est un premier essai d'une application utilisant des Design Pattern lié au Domain Driven Design.

Le dossier contenant le code est `src`

A l'intérieur il y a :

* Le dossier `Domain` qui contient le code métier. Il doite être entièrement découplé du monde extérieur.
* Le dossier `App` qui contient le code qui implémente les interfaces des services du domaine et lie le Domain avec l'Infrastructure.
* Le dossier `Infra` qui contient le code lié au monde extérieur (Framework, Base de données, APIs...)

# Etape 1

Pouvoir charger un agregat en provenance de la base de données. Côté infra, Doctrine ORM est utilisé.
L'entité est dans `Infra\Entity\DoctrineTodo`.

L'opération inverse est également réalisé pour sauvegarder les données en base de données.

# Etape 2

Installer Symfony et brancher le code métier.

# Prérequis

* PHP 7.4
* PDO SQLite

# Installation

```shell
composer install
bin/console doctrine:database:create
bin/console doctrine:migration:migrate
```

# Exécuter un serveur Web avec Symfony Cli ou Rymfony

[Download Rymfony](https://github.com/Orbitale/Rymfony)

[Download Symfony Cli](https://symfony.com/download)

Lancer la commande :

`symfony serve -d`
