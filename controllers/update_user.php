<?php
include_once '../boot.php';

if (!user_logged_in()) {
    header("Location: login");
    die;
}
if (!user_is_admin()) {
    echo 'No permission to update a user';
    die;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once($appBasePath . '/data/models/User.php');
    $user = new User();

    $user->username = $_POST['username'];
    $user->lastname = $_POST['lastname'];
    $user->email    = trim($_POST['email']);
    $user->password = $_POST['password'];
    $user->cpassword = $_POST['password2'];
    $user->user_id  = $_POST['user_id'];
    $user->is_admin = (is_numeric($_POST['is_admin']) ? (int) $_POST['is_admin'] : 0);

    $_SESSION['validationErrors'] = null;
    $_SESSION['updateUser'] = $_POST;

    include_once($appBasePath . '/data/validation/UserValidator.php');
    $userValidator = new UserValidator();

    if (!$userValidator->validateUpdate($user)) {
        $_SESSION['validationErrors'] = $userValidator->getErrors();

        header('Location: update_user.php');
        die();
    }

    include_once($appBasePath . '/services/user.php');
    $user->password = hash('sha256', $user->password);
    UserService::updateUser($user);

    header("Location: index.php");
    die;
}

showUpdateUser();
