<?php
// Active l'affichage des erreurs pour faciliter le débogage
ini_set('display_errors', 1);
// Active l'affichage des erreurs au démarrage du script
ini_set('display_startup_errors', 1);
// Définit le niveau de rapport des erreurs à E_ALL pour signaler toutes les erreurs
error_reporting(E_ALL);

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Définition des constantes utilisées pour les chemins des différents répertoires de l'application
// Ces constantes simplifient la gestion des chemins d'accès aux fichiers et aux ressources

// Chemin vers les contrôleurs
const CONT = 'App/controllers/';
// Chemin vers les modèles
const MOD = 'App/models/';
// Chemin vers les vues
const View = 'App/views/';
// Chemin vers les fichiers JavaScript
const JS = 'assets/js/';
// Chemin vers les fichiers CSS
const CSS = 'assets/css/';
// Chemin vers les images
const IMG = 'assets/images/';
// Chemin vers les modèles de templates
const TMP = 'assets/templates/';

// Inclusion des fichiers nécessaires pour le fonctionnement de la page
// Ces fichiers doivent être inclus dans cet ordre pour que les composants de la page soient correctement initialisés

// Inclusion du fichier de haut de page (généralement contient la partie HTML d'entête)
require_once TMP . 'top.php';
// Inclusion du fichier de menu (généralement contient le menu de navigation)
require_once TMP . 'menu.php';
// Inclusion du fichier de routage (gère les routes et les actions en fonction de la requête)
require_once 'router.php';
// Inclusion du fichier de bas de page (généralement contient la partie HTML de pied de page)
require_once TMP . 'bottom.php';
?>
