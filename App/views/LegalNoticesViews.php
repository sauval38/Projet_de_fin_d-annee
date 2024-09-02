<?php

namespace Views;

// Déclaration de la classe LegalNoticesViews dans l'espace de noms Views
class LegalNoticesViews {

    // Méthode pour afficher les mentions légales du site
    public function legalNotices() {
        // Utilisation de echo pour afficher le contenu HTML des mentions légales
        echo '
        <div id="information"> <!-- Conteneur principal pour les mentions légales -->

            <h1>Mentions Légales</h1> <!-- Titre principal des mentions légales -->
            
            <h2>Éditeur du site</h2> <!-- Sous-titre pour la section sur l\'éditeur du site -->
            <p>Le site <strong>FINAL FANTASY</strong> est édité par <strong>SAUVAL</strong>.</p> <!-- Informations sur l\'éditeur du site -->
            <p>Siège social : <strong>10 chemin du bois 38510 SERMERIEU.</strong></p> <!-- Adresse du siège social -->
            <p>Responsable du site et directeur de la publication : <strong>SAUVAL</strong></p> <!-- Responsable du site -->
            <p>Email de contact : <strong>boubou601@live.fr</strong></p> <!-- Email de contact -->

            <h2>Protection des données personnelles</h2> <!-- Sous-titre pour la section sur la protection des données personnelles -->
            <p>Le site <strong>FINAL FANTASY</strong> ne collecte aucune donnée personnelle sans votre consentement. Si vous remplissez un formulaire de contact, les informations recueillies ne seront utilisées que pour répondre à votre demande. Vous disposez d’un droit d’accès, de rectification et de suppression de vos données personnelles, que vous pouvez exercer en nous contactant à l’adresse suivante : <strong>boubou601@live.fr</strong></p> <!-- Politique de confidentialité et de gestion des données personnelles -->

            <h2>Cookies</h2> <!-- Sous-titre pour la section sur les cookies -->
            <p>Le site <strong>FINAL FANTASY</strong> utilise des cookies pour des raisons strictement fonctionnelles, comme pour améliorer la navigation ou analyser l\'audience de manière anonyme. Vous pouvez configurer votre navigateur pour refuser les cookies si vous le souhaitez.</p> <!-- Informations sur l\'utilisation des cookies -->

            <h2>Propriété intellectuelle</h2> <!-- Sous-titre pour la section sur la propriété intellectuelle -->
            <p>Les textes, images, et autres éléments présents sur ce site sont protégés par les lois en vigueur sur la propriété intellectuelle. Toute reproduction, représentation ou adaptation, totale ou partielle, de ce site, sans autorisation préalable, est interdite.</p> <!-- Avertissement sur la propriété intellectuelle -->

        </div>'; // Fin du conteneur principal
    }
}

?>
