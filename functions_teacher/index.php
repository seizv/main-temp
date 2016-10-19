<?php
define('USERS_DATA_FILE_NAME', 'users.txt');


function render() {
    $errors = [];
    $name = null;
    $password = null;

    $users = getUsers();

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'remove':
                unset($users[$_GET['user-id']]);
                saveUsers($users);
                break;
        }

    } else if ($_POST) {
        if (isset($_POST['name'])) {
            if (strlen($_POST['name']) >= 50) {
                $errors['name'] = 'Error name';
            } else {
                $name = $_POST['name'];
            }
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
            $password_len = strlen($password);
            if ($password_len <= 1 or $password_len >= 10) {
                $errors['password'] = 'Error password';
            }
        }
        if (!$errors) {
            addUser($name, $password);
        }
    }

    include "templates/main.php";
}

function getUsers() {
    if (!file_exists(USERS_DATA_FILE_NAME)) {
        return [];
    }
    return unserialize(
        file_get_contents(USERS_DATA_FILE_NAME));
}

function addUser($name, $password) {
    $users = getUsers();
    $users[] = [
        'id' => count($users) + 1,
        'name' => $name,
        'password' => $password
    ];
    saveUsers($users);
}

function saveUsers($users) {
    file_put_contents(
        USERS_DATA_FILE_NAME, serialize($users));
}

render();