document.getElementById("filterInput").addEventListener("keyup", function() {
    var filter = this.value.toLowerCase();
    var table = document.getElementById("usersTable");
    var rows = table.querySelectorAll("tr:not(:first-child)");
    var hasVisibleRows = false;
    
    if (filter.length >= 3) { // Ne filtrer qu’à partir de 3 caractères
        rows.forEach(function(row) {
            var username = row.cells[0].textContent.toLowerCase();
            var email = row.cells[1].textContent.toLowerCase();
            
            if (username.includes(filter) || email.includes(filter)) {
                row.style.display = "";
                hasVisibleRows = true;
            } else {
                row.style.display = "none";
            }
        });

        // Afficher le tableau seulement si des résultats correspondent au filtre
        if (hasVisibleRows) {
            table.style.display = "table";
        } else {
            table.style.display = "none";
        }
    } else {
        table.style.display = "none"; // Cacher le tableau si moins de 3 caractères sont saisis
    }
});