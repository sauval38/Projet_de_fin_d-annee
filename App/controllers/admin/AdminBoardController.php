<?php

namespace AdminControllers;

use AdminViews\AdminBoardViews;
use AdminModels\AdminBoardModels;

class AdminBoardController {
    protected $adminBoardViews;
    protected $adminBoardModels;

    public function __construct() {
        $this->adminBoardViews = new AdminBoardViews();
        $this->adminBoardModels = new AdminBoardModels();
    }

    public function getUser() {
        $users = $this->adminBoardModels->listUsers();
        $this->adminBoardViews->usersViews($users);
    }

    public function updateRole() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = $this->adminBoardModels->listUsers();
            foreach ($users as $user) {
                $username = htmlspecialchars($user['username']);
                if (isset($_POST['role_' . $username])) {
                    $newRole = $_POST['role_' . $username];
                    $this->adminBoardModels->updateUserRole($username, $newRole);
                }
            }
        }
    }
}
