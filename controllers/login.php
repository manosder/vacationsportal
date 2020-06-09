<?php 
include_once '../boot.php';

if (user_logged_in()) {
    header("Location: index");
    die;  
}

include_once($appBasePath.'/services/user.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    if(!empty($email) && !empty($password))
    {
        $user = UserService::getByEmail($email);

        if (hash_equals($user->password, $password)) 
        {
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['username'] = $user->username;
            $_SESSION['lastname'] = $user->lastname;
            $_SESSION['is_admin'] = $user->is_admin;
            
            header("Location: index.php");
            die;
        }
        echo "Please enter the correct email & password";
    }else 
    {
        echo "Do not leave empty spaces";
    }
}

showLogin();