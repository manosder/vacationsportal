<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <?php include_once($appBasePath . '/parts/navbar.php'); ?>
    <div class="jumbotron d-flex justify-content-center">
        <h3>All registerd Users</h3>
    </div>
    <div class="container container_app_table">
        <div class="d-flex justify-content-center">
            <a href="create_user" data-toggle="tooltip" data-placement="top" title="Add User!"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
        <hr>
        <ol class="gradient-list">
            <?php foreach ($userlist as $user) :
                if ($user->is_admin == 0) {
                    $user->is_admin = "Employee";
                } else {
                    $user->is_admin = "Supervisor";
                }
            ?>
                <li>
                    First Name: <?= $user->username ?><br>
                    Last Name: <?= $user->lastname ?><br>
                    Email: <?= $user->email ?><br>
                    Role: <?= $user->is_admin ?>
                </li>
                <form style="align-items:center" action="update_user" method="GET">
                    <input type="submit" name="toUpdate" class="button" value="Update User" />
                    <input type="hidden" id="toUpdate" name="username" value="<?= $user->username ?>">
                    <input type="hidden" id="toUpdate" name="lastname" value="<?= $user->lastname ?>">
                    <input type="hidden" id="toUpdate" name="user_id" value="<?= $user->user_id ?>">
                    <input type="hidden" id="toUpdate" name="email" value="<?= $user->email ?>">
                </form>
                <hr>
            <?php endforeach; ?>
        </ol>
    </div>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>