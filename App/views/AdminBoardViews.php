<?php

namespace Views;

class AdminBoardViews {
    public function usersViews($users) {
        if (isset($users) && is_array($users) && count($users) > 0) { ?>
            <h1>Modifications rôles</h1>
            <form id="role" method="post">
                <input type="text" id="filterInput" name="newInput" placeholder="Filter users (min. 3 characters)">
                <table id="usersTable" style="display: none;">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td>
                                <select name="role_<?= htmlspecialchars($user['username']) ?>">
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <input type="submit" value="Ajouter">
            </form>
            <script src="./assets/js/filterUser.js"></script>
        <?php } else { ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php }
    }
}
