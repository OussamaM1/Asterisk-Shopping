# Asterisk-Shopping

## Introduction

Réalisation d’une application web e-commerce pour une entreprise de vente des produits informatiques et vidéo, en utilisant 
HTML, CSS, Javascript, PHP (Laravel), et MySQL.

Réalisé par : 
 - Yassine Elhilali
 - Oussama Makhlouk
 
Encadré par : 
 - M.EL YOUSFI ABDERRAHMANE


## Déploiement du projet

   - Extraire la base de donnée du dossier base donnee puis créer une base de donnee local nommé `asteriskshopping` utf8_general_ci
   - Télécharger composer https://getcomposer.org/download/
   - Cloner le projet.
   - Renommer le fichier `.env.example`  à  `.env` (Ouvrez votre console puis cd au répertoire racine du projet executer `mv .env.example .env` ).
   - Exécuter `composer install`.
   - Exécuter `php artisan key:generate` .
   - Exécuter `php artisan migrate` .
   - Exécuter `php artisan serve` .
   
Vous pouvez accéder au projet via `localhost:8000` .
### Pour accéder à l'espace d'administration 
   - lien : `localhost:8000\admin`
   - email : admin@admin.com
   - mot de passe : admin
   
## Screenshots
![Interface](https://i.ibb.co/6ZW1Qkz/screencapture-localhost-8000-2020-07-23-11-38-22.png)

![Panier](https://i.ibb.co/WvCXH5T/screencapture-localhost-8000-lignes-2020-07-23-11-49-11.png)

![Article](https://i.ibb.co/16YnV1Y/screencapture-localhost-8000-articles-2020-07-23-11-46-27.png)

![Espace d'administration](https://i.ibb.co/hmmvMg8/espace.png)
