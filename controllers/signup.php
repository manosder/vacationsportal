<?php
include_once '../boot.php';


if (user_logged_in()) {
    header("Location: index");
    die;
}
include_once($appBasePath . '/controllers/pages.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include_once($appBasePath . '/data/models/User.php');
    $user  = new User();

    $user->username = $_POST['username'];
    $user->lastname = $_POST['lastname'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->cpassword = $_POST['password2'];

    $_SESSION['validationErrors'] = null;
    $_SESSION['signup'] = $_POST;


    include_once($appBasePath . '/data/validation/UserValidator.php');
    $userValidator = new UserValidator();

    if (!$userValidator->validate($user)) {
        $_SESSION['validationErrors'] = $userValidator->getErrors();


        header("Location: signup.php");

        die();
    }


    include_once($appBasePath . '/services/user.php');
    $user->password = hash('sha256', $user->password);
    UserService::createUser($user);

    header("Location: login.php");
    die;
}

showSignUp();
