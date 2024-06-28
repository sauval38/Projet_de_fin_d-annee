<?php
namespace Views;

class AddGamesViews {
    public function add() {
        echo '
        <div class="form-container">
            <h1 id="ajouter">Ajouter un jeux</h1>
            <form class="form" action="admin/ajouterunjeux" method="post" enctype="multipart/form-data">

                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" required>
                
                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>

                <label for="contents">Contenu :</label>
                <textarea id="contents" name="contents" required></textarea>

                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" required>

                <label for="mode">Mode de jeux :</label>
                <input type="text" id="mode" name="mode" required>

                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" required>

                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" required>

                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" required>

                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" required>

                <label for="date">Date de sortie</label>
                <input type="datetime-local" id="date" name="date" required>
                
                <label for="image_path">Chemin de l\'image :</label>
                <input type="file" id="image_path" name="image_path" accept="image/*" required>
                
                <input type="submit" value="Ajouter">
            </form>
        </div>
        ';
    }
}