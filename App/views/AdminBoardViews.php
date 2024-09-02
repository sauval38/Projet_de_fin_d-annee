<?php

namespace Views;

// Déclaration de la classe AdminBoardViews dans l'espace de noms Views
class AdminBoardViews {

    // Méthode pour afficher les vues de modification des rôles des utilisateurs
    public function usersViews($users) {

        // Vérifie si $users est défini, est un tableau et contient au moins un utilisateur
        if (isset($users) && is_array($users) && count($users) > 0) { ?>

            <!-- En-tête de la section de modification des rôles -->
            <h1>Modifications rôles</h1>

            <!-- Formulaire pour modifier les rôles des utilisateurs -->
            <form id="role" method="post">

                <!-- Champ de texte pour filtrer les utilisateurs par nom ou email -->
                <input type="text" id="filterInput" name="newInput" placeholder="Filter users (min. 3 characters)">

                <!-- Tableau pour afficher les utilisateurs et leurs rôles -->
                <table id="usersTable" style="display: none;">
                    <tr>
                        <!-- En-têtes des colonnes du tableau -->
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    
                    <!-- Boucle à travers chaque utilisateur pour afficher leurs informations -->
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <!-- Nom d'utilisateur -->
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <!-- Email de l'utilisateur -->
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <!-- Sélecteur pour modifier le rôle de l'utilisateur -->
                            <td>
                                <select name="role_<?= htmlspecialchars($user['username']) ?>">
                                    <!-- Option "Admin" avec sélection conditionnelle -->
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <!-- Option "User" avec sélection conditionnelle -->
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Bouton pour soumettre le formulaire -->
                <input type="submit" value="Ajouter">
            </form>
            
            <!-- Inclusion du script JavaScript pour filtrer les utilisateurs -->
            <script src="./assets/js/filterUser.js"></script>
        <?php } else { ?>

            <!-- Message affiché si aucun utilisateur n'est trouvé -->
            <p>Aucun utilisateur trouvé.</p>

        <?php }
    }
}
?>
