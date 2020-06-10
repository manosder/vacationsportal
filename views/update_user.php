<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <?php include_once($appBasePath . '/parts/navbar.php'); ?>
    <div id="login-box" class="d-flex justify-content-center">
        <form class="form-group" method="post" name="updateUser">
            <h4 id="wfa"> <?= $_GET['username'] . " " . $_GET['lastname']  ?> </h4>

            <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">

            <label for="username">First Name:</label>
            <input type="text" name="username" value="<?= $_GET['username'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['username'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['username']; ?>
                </div>
            <?php endif; ?>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" value="<?= $_GET['lastname'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['lastname'])) : ?>
                <div class="validationErrors">
                    <?= $_SESSION['validationErrors']['lastname'] ?>
                </div>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $_GET['email'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['email'])) : ?>
                <div class="validationErrors">
                    <p><?= $_SESSION['validationErrors']['email'] ?></p>
                </div>
            <?php endif; ?>

            <input type="password" name="password" placeholder="enter new password..">
            <?php if (!empty($_SESSION['validationErrors']['password'])) : ?>
                <div class="validationErrors">
                    <p><?= $_SESSION['validationErrors']['password'] ?></p>
                </div>
            <?php endif; ?>

            <input type="password" name="password2" placeholder="enter password again">
            <?php if (!empty($_SESSION['validationErrors']['password2'])) : ?>
                <div class="validationErrors">
                    <p><?= $_SESSION['validationErrors']['password2'] ?></p>
                </div>
            <?php endif; ?>

            <label for="is_admin">Choose role for the user</label>
            <select id="wfa" id="is_admin" name="is_admin">
                <option value="0">Employee</option>
                <option value="1">Supervisor</option>
            </select>

            <input class="button button1" type="submit" value="Update User">
        </form>
    </div>
</body>

</html>