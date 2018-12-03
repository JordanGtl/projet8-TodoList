[![Build Status](https://travis-ci.org/JordanGtl/projet8-TodoList.svg?branch=master)](https://travis-ci.org/JordanGtl/projet8-TodoList)    [![Codacy Badge](https://api.codacy.com/project/badge/Grade/141ce25890ca430a922315f3ae9876ae)](https://www.codacy.com/app/JordanGtl/projet8-TodoList?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=JordanGtl/projet8-TodoList&amp;utm_campaign=Badge_Grade)

**Install project / EN**

1. Clone repository.
2. Rename file '.env.dist' to '.env' and edit variables.
3. Install dependency with command : composer install

_for run tests_
- 4.1  Run custom command : php bin/console app:test

_for production_
- 5.1  install database with command : php bin/console doctrine:database:create
- 5.2 update database schema with command : php bin/console doctrine:schema:update
- 5.3 if you want use demo data, load fixtures with command : php bin/console doctrine:fixtures:load


**Installation du projet / FR**

1. Récupérer le dépot.
2. Renommer le fichier '.env.dist' en '.env' et modifier les variables.
3. Installer les dépendances avec la commande : composer install

_Pour exécuter les tests_
- 4.1  Utiliser la commande personnalisée : php bin/console app:test

_Pour la production_
- 5.1 Installer la base de données avec la commande : php bin/console doctrine:database:create
- 5.2 Créer les tables de la base de données avec la commande : php bin/console doctrine:schema:update
- 5.3 Si vous voulez utiliser le jeu de démo, charger les fixtures avec la commande : php bin/console doctrine:fixtures:load


