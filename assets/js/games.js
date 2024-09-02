// Sélectionne tous les éléments avec la classe "game-title" et applique une fonction pour chacun d'entre eux.
document.querySelectorAll(".game-title").forEach(function(element) {
    // Ajoute un écouteur d'événements "click" à chaque élément "game-title".
    element.addEventListener("click", function() {
        // Récupère la valeur de l'attribut "data-game-id" de l'élément cliqué.
        let gameId = this.getAttribute("data-game-id");
        // Sélectionne l'élément dont l'ID est "links-" suivi de la valeur de "gameId".
        let links = document.getElementById("links-" + gameId);
        // Vérifie si l'élément sélectionné est actuellement masqué (display: none).
        if (links.style.display === "none") {
            // Si oui, affiche l'élément (display: block).
            links.style.display = "block";
        } else {
            // Sinon, masque l'élément (display: none).
            links.style.display = "none";
        }
    });
});
