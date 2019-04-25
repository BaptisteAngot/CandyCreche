# CandyCreche

Candy Creche est un projet visant à mettre en relation les parents souhaitant faire garder leurs enfants avec les différentes structures disponible sur le marché.
Ce projet sera réalisé sous Symfony et de nombreuses fonctionnalités lui seront ajouté au fur et à mesure de son développement.

## Installation

Utiliser le manager de paquet [yarn](https://yarnpkg.com/fr/docs/install#windows-stable) et [composer](https://getcomposer.org/download/)

```
composer install
composer require encore
composer require admin
composer require toiba/fullcalendar-bundle
yarn install
yarn add bootstrap
yarn add jquery
yarn add popper.js
yarn encore dev --watch
php bin/console c:c
php bin/console server:run
```

## Base de données
Pour la réalisation de ce projet, nous avons réalisés une base de donnée SQLite. Afin de l'obtenir, veuillez créer un fichier data.db dans /var et installer une base de donnée SQLite sur celui-ci.
Une fois cela fait, effectuer les commandes suivantes à la racine du dossier cloné : 
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

## Membre du projet

Membre de ce projet:
- Baptiste Angot (chef de projet & développeur)
- Nicolas Dufresne (développeur)
- Léo Fouquier (Scrum master & développeur)
- Jean Baptiste de Saint-Léger (développeur)
- Quentin Leroy (développeur)

