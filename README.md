# parsage-allocine
Exercice de parsage du site allocine.fr pour Datanaute

## Objectif :
Création d'un moteur de recherche simple (page web) affichant un ou plusieurs films en fonction du titre saisie, avec comme informations (au minimum) : le titre, l'année de sortie, le réalisateur et le genre.
Les informations sont à récupérer sur le site allocine.fr (parsage des pages).

## Conditions
Exercice à réaliser en 5 jours à compter du 06/02/2020.

# Progression
Après des tests en PHP, j'ai choisi d'utiliser le Python.
La branche "master" du repository est donc inutile et est juste la trace d'anciennes recherches.
La branche "python" est la branche finale du projet. En effet, pour executer le programme il suffit de lancer le script "main.py" et taper notre recherche. Le script va générer une page html nommée "resultat.html" contenant le résultat de la recherche.

## Dépendences
Le script Python utilise les librairies suivantes : beautifulsoup4 et requests
Pour les installer il suffit de taper les commandes suivantes dans le cmd :
  py -m pip install beautifulsoup4
  py -m pip install requests
