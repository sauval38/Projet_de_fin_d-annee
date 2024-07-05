document.querySelectorAll(".game-title").forEach(function(element) {
    element.addEventListener("click", function() {
        let gameId = this.getAttribute("data-game-id");
        let links = document.getElementById("links-" + gameId);
        if (links.style.display === "none") {
            links.style.display = "block";
        } else {
            links.style.display = "none";
        }
    })
})