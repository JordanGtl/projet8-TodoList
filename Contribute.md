English
==========================================================
-  Clone repository with command

`git clone https://github.com/JordanGtl/projet8-TodoList`

 - Go to project directory

`cd projet8-TodoList`

- Download and install dependency with composer

` composer install `

 - Install database

1. edit parameters.yml file in direcotry `app/config`
2. `php bin/console doctrine:database:create`
3. `php bin/console doctrine:schema:update --force`
4. `php bin/console doctrine:fixtures:load`

- After add your code, create new branch in repository with command

`git checkout -b my-branch-name`

- commit your change (don't forget git add if you add file)

`git commit -m "name of my commit"`

- Send your all modification on your github repository

`git push origin my-branch-name`

- On homepage of your github repository, click on button "Compare & pull request"

- Write description and click on button "create pull request"

French
==========================================================
-  Cloner le dépot

`git clone https://github.com/JordanGtl/projet8-TodoList`

 - Se rendre dans le dossier du projet

`cd projet8-TodoList`

- Télécharger et installer les dépendances du projet via composer

` composer install `

 - Installer la base de données

1. Editer le fichier parameters.yml dans le dossier `app/config` saisir ensuite les commandes ci-dessous
2. `php bin/console doctrine:database:create`
3. `php bin/console doctrine:schema:update --force`
4. `php bin/console doctrine:fixtures:load`

- Après l'ajout de vos modifications, créer une nouvelle branche

`git checkout -b my-branch-name`

- Commit l'ensemble de vos modifications (ne pas oublier le "git add" si vous avez ajouté des fichiers)

`git commit -m "name of my commit"`

- Envoyer l'ensemble de vos modifications sur votre dépot

`git push origin my-branch-name`

- Sur la page github de votre dépot, cliquer sur le bouton "Compare & pull request"

- Saisir un message lié au pull et cliquer sur le bouton "create pull request"