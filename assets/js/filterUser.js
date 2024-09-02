// Sélectionne l'élément avec l'ID "filterInput" et ajoute un écouteur d'événements pour l'événement "keyup" (lorsqu'une touche est relâchée).
document.getElementById("filterInput").addEventListener("keyup", function() {
    // Récupère la valeur actuelle de l'input, la convertit en minuscules pour une comparaison insensible à la casse.
    var filter = this.value.toLowerCase();
    // Sélectionne le tableau avec l'ID "usersTable".
    var table = document.getElementById("usersTable");
    // Sélectionne toutes les lignes (tr) du tableau, sauf la première ligne (généralement l'en-tête).
    var rows = table.querySelectorAll("tr:not(:first-child)");
    // Initialise un indicateur pour vérifier si au moins une ligne est visible après filtrage.
    var hasVisibleRows = false;
    // Si le texte saisi dans l'input contient au moins 3 caractères.
    if (filter.length >= 3) {
        // Parcourt chaque ligne du tableau.
        rows.forEach(function(row) {
            // Récupère le contenu de la première cellule (nom d'utilisateur) et le convertit en minuscules.
            var username = row.cells[0].textContent.toLowerCase();
            // Récupère le contenu de la deuxième cellule (email) et le convertit en minuscules.
            var email = row.cells[1].textContent.toLowerCase();
            // Vérifie si le filtre correspond soit au nom d'utilisateur, soit à l'email.
            if (username.includes(filter) || email.includes(filter)) {
                // Si oui, affiche la ligne.
                row.style.display = "";
                // Indique qu'au moins une ligne est visible.
                hasVisibleRows = true;
            } else {
                // Sinon, masque la ligne.
                row.style.display = "none";
            }
        });
        // Si au moins une ligne est visible, affiche le tableau.
        if (hasVisibleRows) {
            table.style.display = "table";
        } else {
            // Sinon, masque le tableau.
            table.style.display = "none";
        }
    } else {
        // Si le filtre a moins de 3 caractères, masque le tableau.
        table.style.display = "none"; 
    }
});
