<?php

namespace Views;

// Déclaration de la classe DeleteBossViews dans l'espace de noms Views
class DeleteBossViews {

    // Méthode pour afficher la liste des bosses à supprimer
    public function listDeleteBoss($games) {
        ?>
        <!-- Titre de la page -->
        <h1>LISTE DES BOSS</h1>
        <!-- Conteneur principal pour la liste des boss à supprimer -->
        <div id="delete-boss">
            <?php 
            // Vérifie si la variable $games n'est pas vide
            if (!empty($games)): 
                // Itère sur chaque élément dans le tableau $games
                foreach ($games as $game): 
                    ?>
                    <!-- Conteneur pour chaque boss -->
                    <div class="list">
                        <!-- Affiche le nom du boss -->
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['name_boss']) ?>
                        </h2>
                        <!-- Affiche l'image du boss -->
                        <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_boss']) ?>" alt="boss<?= htmlspecialchars($game['name_boss']) ?>">
                        <!-- Conteneur pour le formulaire de suppression -->
                        <div class="button-container">
                            <form method="POST">
                                <!-- Champ caché pour transmettre l'identifiant du boss -->
                                <input type="hidden" name="boss_id" value="<?= htmlspecialchars($game['id']) ?>">
                                <!-- Bouton pour soumettre le formulaire et supprimer le boss -->
                                <button type="submit" name="delete">Supprimer</button>
                            </form>
                        </div>
                    </div>
                <?php 
                endforeach; 
            // Si la variable $games est vide
            else: 
                ?>
                <!-- Message affiché lorsqu'aucune information n'est trouvée -->
                <h1>Information non trouvée</h1>
            <?php 
            endif; 
            ?>
        </div>
        <?php
    }
}
?>
