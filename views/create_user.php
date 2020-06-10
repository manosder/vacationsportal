<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <?php include_once($appBasePath . '/parts/navbar.php'); ?>
    <div id="login-box" class="d-flex justify-content-center">
        <form class="form-group" method="post" name="createUser">
            <h4 id="wfa"> Create user</h4>

            <label for="username">First Name:</label>
            <input type="text" name="username" value="<?= $_SESSION['createUser']['username'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['username'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['username'] ?>
                </div>
            <?php endif; ?>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" value="<?= $_SESSION['createUser']['lastname'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['lastname'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['lastname'] ?>
                </div>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $_SESSION['createUser']['email'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['email'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['email'] ?>
                </div>
            <?php endif; ?>

            <label for="password">Password:</label>
            <input type="password" title="Must contain At Least a number, 1 Capital and a Lowercase Letter" name="password">
            <?php if (!empty($_SESSION['validationErrors']['password'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['password'] ?>
                </div>
            <?php endif; ?>

            <label for="password">Confirm Password:</label>
            <input type="password" name="password2">
            <?php if (!empty($_SESSION['validationErrors']['password2'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['password2'] ?>
                </div>
            <?php endif; ?>

            <label for="is_admin">Choose role for the user</label>
            <select id="wfa" id="is_admin" name="is_admin">
                <option value="0">Employee</option>
                <option value="1">Supervisor</option>
            </select>
            <input class="button button1" type="submit" value="Create User">
        </form>
    </div>
</body>

</html>