
![Logo](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRltQkO4FaJel40qu6QBOYyJhytHB1tcmJS3PwEXoqQ5g&s)


# Jeu de cartes pour Webnet

Énoncé : 

On souhaite développer un jeu de cartes.
Dans ce jeu, un joueur tire une main de X cartes de manière aléatoire depuis un jeu composé de 52 cartes uniques. Chaque carte possède une couleur ("Carreau", par exemple) et une valeur ("10", par exemple). La « force» d’une carte est basée sur sa couleur puis sur sa valeur selon un ordre convenu d’avance.

On vous demande de :

    - Générer un ordre aléatoire des couleurs et un ordre aléatoire des valeurs.L'ordre des couleurs est, par exemple, l'un des suivants : Carreau, Cœur, Pique, Trèfle L'ordre des valeurs est, par exemple, l'un des suivants : AS, 5, 10, 8, 6, 5, 7, 4, 2, 3, 9, Dame, Roi, Valet.
    - Permettre à l’utilisateur de saisir le nombre (X) de cartes à piocher et à la validation construire une main de X cartes de manière aléatoire.
    - Présenter la main "non triée" à l'écran puis la main triée selon l’ordre défini aléatoirement dans la 1ère et 2ème étape. C'est-à-dire que vous devez classer les cartes par couleur puis valeur.

Exemple :
    • PHP 8.x
    • Symfony 6.x

Objectif de temps: 
3h maximum à partir du moment où tu commences le développement (le temps pour monter la stack ne compte pas).

Rendu :
Lien vers un dépôt GIT rendu public

Tu peux utiliser un serveur web pour présenter la main de l'utilisateur (une interface graphique est la bienvenue), ou simplement la sortie console. L'objectif de cet exercice est de montrer l'étendue de tes capacités en développement orienté objet, la qualité du code produit, le respect des normes et comment tu abordes ce problème d’un point de vue algorithmique.

## Installation et Fonctionnement


Mise à jour des dépendences du projet : 
```
composer update
```

Lancer le projet (php) : 
```
php -S 127.0.0.1:8080
```
ou
```
symfony serve -d
```

En accédant à l'URL vous tomberez sur le jeu.
Bon jeu !