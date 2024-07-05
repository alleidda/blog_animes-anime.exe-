# blog_animes-anime.exe-
Un blog qui répertorie différents animes qui peuvent être filtrer par genres et studios d'animation.
Il y a la partie administrateur qui nous sert à modifier et créer des animes, des studios d'animations et des genres.
# Installation

- Cloner ce repository

## Installer les dépendances
- Ouvrez le terminal sur le dossier frontend et tapez 
npm install

- Lancez votre serveur mySQL en local

- Dans frontend/src/containers/Site/Application/Application.js :
Changer le début de l'url pour qu'il corresponde à votre aborescence
(http://localhost/projets/blog_animes) -> partie à modifier dans "const loadData, const loadGenres et const loadStudios


## Relier la database mySQL au serveur
- Ouvrez le fichier Model.php dans le dossier backend/models :
- Renseignez username et password ( vos identifiants database mySQL )
- Renseignez database ( Le nom que vous souhaitez )

## Créer et migrer la database sur mySQL
- Allez dans phpMyAdmin
- Importez la base de donnée "dbanimes.sql" qui contient des exemples 

## Démarrer l'application

### Mise en service de l'app client
- Ouvrez un autre terminal sur le dossier client et tapez la commande 
npm start
- Gardez le ouvert
-Ouvrez votre navigateur sur :
http://localhost:3000

### Admin
- Dans votre navigateur utilisez le lien que vous avez modifier dans rontend/src/containers/Site/Application/Application.js [(http://localhost/projets/blog_animes)/backend/back/login ] pour accéder au backend et au côté admin

### Bonne utilisation 🙂
