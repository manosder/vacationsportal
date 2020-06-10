<!DOCTYPE html>
<html lang="en">
<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/parts/head.php');
?>

<body>
    <header><?php include_once($appBasePath . '/parts/navbar.php'); ?></header>
    <div class="jumbotron d-flex justify-content-center">
        <h3>Your Vacation Requests</h3>
    </div>
    <div class="container container_app_table">
        <div class="d-flex justify-content-center">
            <a href="create_application">Submit Request </a>
        </div>
        <hr>
        <ol class="gradient-list">
            <?php
            foreach ($applications as $application) :
                if ($application->status == 0) {
                    $application->status = "Rejected";
                    $application->id = "alert alert-danger";
                } elseif ($application->status == 1) {
                    $application->status = "Accepted";
                    $application->id = "alert alert-success";
                } else {
                    $application->status = "Pending";
                };
            ?>
                <li id="applicationslist">
                    Date submitted: <?= $application->date_submitted ?><br>
                    Requested: <?= $application->days ?> working days from <?= $application->date_from . " till " . $application->date_to ?>
                    <br>
                    for: <p><?= $application->reason ?></p><br>
                    <div class="<?= $application->id; ?>"><?= $application->status ?></div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</body>

</html>