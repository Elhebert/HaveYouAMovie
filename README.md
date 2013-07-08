#HaveYouAMovie 0.1 (alpha)
##Créer votre liste de films et de séries très facilement

##HYAM c'est quoi ?
Cette version de HYAM à été codé pour aider mon père à tenir une liste de films et de série à jour sans devoir imprimer 300 pages excell.
De plus l'interface du site rend plus facile la recherche d'un film et des ses infos.

J'utilise une API Allocine homemade, on en trouve plusieurs sur le net, perso j'utilise [celle ci](http://wiki.gromez.fr/dev/api/allocine_v3).

Mon père cherchant juste à avoir une version qui puisse tourné sans devoir chippoté, je n'ai pas vraiment chercher à coder proprement, mais promis, je vais améliorer tout ça !

* *@author*     Elhebert
* *@name*       HYAM (HaveYouAMovie)
* *@version*    0.1 (aplha)

##Disclaimer

Je tiens à vous mettre en garde ami codeur ! Ce code à été réaliser dans des conditions de codage foireux *optimale* !
En lisant mon code tu risque :
* D'avoir de saigner des yeux
* De faire un crise cardiaque
* De faire un malaise
* Et bien d'autres choses pas cool à avoir (Morpions, ...) !

En d'autres termes en acceptant de lire se code tu me décharge de toute responsabilité de ce qui pourrait t'arriver ensuite :)

##Installation

Une fois le dossier télécharger il y a quelques petites choses à faire afin que **HYAM** fonctionne :
* L'arboresence DOIT être la suivante (Je sais c'est idiot, mais si ce n'est pas le cas certain script ne tourneront pas...): 
    
        /www/HaveYouAMovie  
        |______/includes  
        |______.htaccess  
        |______index.php  

* Les accès à la base de donnée peuvent être modifié dans le fichier /HaveYouAMovie/includes/core/config.php
* La configuration de la bse de donnée se trouve dans le fichier /HaveYouAMovie/includes/core/db.sql

* Activer le mod **rewrite_module** et faire en sorte que votre *http.conf* accepte les **.htaccess**

##Amélioration à venir
Oui je sais il y en as beaucoup, car pour le moment, mon code ne ressemble à rien :

* Utilisation d'un système de template (ex : RainTPL)
* Optimisation des script ajax afin qu'ils soient indépendant du nom du dossier source
* Création d'un script d'installation afin de simplifié cette dernière
* Amélioration de la clarté du code, car pour le moment il ressemble à rien !
* Et plein d'autre chose que j'ai sans nul doute oublier !