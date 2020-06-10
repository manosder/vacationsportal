<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <?php include_once($appBasePath . '/parts/navbar.php'); ?>
    <div id="login-box" class="container request-form-container d-flex justify-content-center">
        <form method="post" name="vacationRequest">
            <h4 id="wfa"> Vacation Request</h4>

            <label for="datefrom" style="text-decoration:underline;margin-top:10px;">Start Date:</label>
            <input type="date" name="datefrom" value="<?= $_SESSION['vacationRequest']['datefrom'] ?>"><br>

            <label for="dateto" style="text-decoration:underline;">End Date:</label>
            <input type="date" name="dateto" value="<?= $_SESSION['vacationRequest']['dateto'] ?>">
            <?php if (!empty($_SESSION['validationErrors']['duration'])) : ?>
                <div class="validationErrors">
                    <p><?= $_SESSION['validationErrors']['duration'] ?></p>
                </div><br>
            <?php endif; ?>

            <label for="reason" style="text-decoration:underline;">Reason:</label>
            <textarea id="reason" name="reason"><?= $_SESSION['vacationRequest']['reason'] ?></textarea>
            <?php if (!empty($_SESSION['validationErrors']['reason'])) : ?>
                <div class="validationErrors">
                    <p><?= $_SESSION['validationErrors']['reason'] ?></p>
                </div><br>
            <?php endif; ?>

            <input class="button button1" type="submit" value="Request">
        </form>
    </div>
</body>
<script>
    <?php include_once($appBasePath . '/js/script.js'); ?>
</script>

</html>