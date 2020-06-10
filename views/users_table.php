<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <?php include_once($appBasePath . '/parts/navbar.php'); ?>
    <div class="jumbotron d-flex justify-content-center">
        <h3>Registered Users</h3>
    </div>

    <div class="d-flex justify-content-center">
        <a href="create_user" data-toggle="tooltip" data-placement="top" title="Add User!"><i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
    <hr>
    <div class="container">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Update</th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php foreach ($userlist as $user) :
            if ($user->is_admin == 0) {
                $user->is_admin = "Employee";
            } else {
                $user->is_admin = "Supervisor";
            }
        ?>

            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td> <?= $user->username ?></td>
                            <td><?= $user->lastname ?> </td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->is_admin ?></td>
                            <td>
                                <form id="table_form" style="align-items:center" action="update_user" method="GET">
                                    <input type="submit" id="toUpdate" name="toUpdate" class="button" value="Update User" />
                                    <input type="hidden" id="toUpdate" name="username" value="<?= $user->username ?>">
                                    <input type="hidden" id="toUpdate" name="lastname" value="<?= $user->lastname ?>">
                                    <input type="hidden" id="toUpdate" name="user_id" value="<?= $user->user_id ?>">
                                    <input type="hidden" id="toUpdate" name="email" value="<?= $user->email ?>">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <?php endforeach; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>