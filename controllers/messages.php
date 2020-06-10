<?php
include_once '../boot.php';

if (!user_logged_in()) {
    header("Location: login");
    die;
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include_once($appBasePath . '/data/models/Application.php');
    $app = new Application();

    $app->status  = $_GET['status'];
    $app->id      = $_GET['id'];


    if ($app->status == 0) {
        $app->reply_message = "Dear employee, your supervisor has rejected your application
        submitted on ";

        $subject = 'Time Off Request';
        mail($to, $subject, $app->reply_message);

        include_once($appBasePath . '/services/application.php');
        ApplicationService::rejectApplication($app);
    } elseif ($app->status == 1) {
        $app->reply_message = "Dear employee, your supervisor has accepted your application
        submitted on ";

        $subject = 'Time Off Request';
        mail($to, $subject, $app->reply_message);

        include_once($appBasePath . '/services/application.php');
        ApplicationService::acceptApplication($app);
    }
}

showMessages();
