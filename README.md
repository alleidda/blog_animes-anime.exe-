# blog_animes-anime.exe-
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
- Ouvrez le fichier config.json dans le dossier server/config à "development":
- Renseignez username et password ( vos identifiants database mySQL )
- Renseignez database ( Le nom que vous souhaitez )

## Créer et migrer la database sur mySQL
- Ouvrez le terminal sur le dossier server
- Tapez la commande: 
sequelize db:create
 ( le schéma se crée dans la db mySQL avec le nom que vous aviez choisi )
- Tapez la commande: 
sequelize db:migrate
 ( les models migrent dans la db mySQL )

## Démarrer l'application

### mise en service du serveur
- Ouvrez un terminal sur le dossier server et tapez la commande 
npm start
 
- Gardez le ouvert

### Mise en service de l'app client
- Ouvrez un autre terminal sur le dossier client et tapez la commande 
npm start

- Gardez le ouvert

### Ouvrer votre navigateur sur :
http://localhost:3000


### Happy ! Bonne utilisation 🙂
