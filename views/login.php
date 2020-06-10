<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <div id="login-box" class="d-flex justify-content-center align-items-center">
        <form method="post">
            <h4 id="wfa">Welcome </span></h4>
            <p> Log in to your account below to book your vacation</p>
            <div class="user-box">
                <input type="text" name="email" placeholder="Enter email">
            </div>
            <div class="user-box">
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <input class="button button1" type="submit" value="Login">
            <div class="wrap">
                <a class="link" href="signup.php">Register </a>
            </div>
        </form>
    </div>
</body>

</html>