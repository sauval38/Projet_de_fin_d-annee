<!DOCTYPE html>
<!-- Déclare le type de document HTML5, ce qui aide les navigateurs à rendre la page correctement -->
<html lang="fr">
<!-- Début du document HTML avec la langue définie sur le français -->
<head>
    <!-- Section d'en-tête du document HTML -->
    <meta charset="UTF-8">
    <!-- Définit l'encodage des caractères à UTF-8, supporte la plupart des caractères spéciaux -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Assure que la page est correctement affichée sur les appareils mobiles avec une largeur de viewport adaptative -->
    <base href="http://localhost/Projet_de_fin_d'annee/">
    <!-- Définit l'URL de base pour les chemins relatifs dans le document -->
    <link rel="stylesheet" href="<?= CSS;?>index.css">
    <!-- Lien vers la feuille de style CSS, avec le chemin défini par la constante PHP CSS. Le fichier CSS sera donc chargé pour styliser la page -->
    <title><? $_SERVER['REQUEST_URI'];?>Final Fantasy</title>
    <!-- Définir le titre de la page affiché dans l'onglet du navigateur -->
    <!-- Note : <? $_SERVER['REQUEST_URI'];?> est une syntaxe PHP incorrecte pour afficher la variable REQUEST_URI. -->
    <!-- Il faudrait utiliser <?php echo $_SERVER['REQUEST_URI']; ?> à la place. -->
</head>
<body>
    <!-- Début de la section du corps du document HTML où le contenu de la page sera placé -->

    
