<?php

namespace Views;

class AdminBoardViews {
    public function usersViews($users) {
        if (isset($users) && is_array($users) && count($users) > 0) {
            echo '<form method="post">';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Username</th>';
            echo '<th>Email</th>';
            echo '<th>Role</th>';
            echo '</tr>';
            
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($user['username']) . '</td>';
                echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                echo '<td>';
                echo '<select name="role_' . htmlspecialchars($user['username']) . '">';
                echo '<option value="admin"' . ($user['role'] == 'admin' ? ' selected' : '') . '>Admin</option>';
                echo '<option value="user"' . ($user['role'] == 'user' ? ' selected' : '') . '>User</option>';
                echo '</select>';
                echo '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            echo '<input type="submit" value="Update Roles">';
            echo '</form>';
        } else {
            echo 'No users found.';
        }
    }
}
