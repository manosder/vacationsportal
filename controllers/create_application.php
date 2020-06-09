<?php 
include_once '../boot.php';

if (!user_logged_in()) {
    header("Location: login");
    die;  
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include_once($appBasePath.'/data/models/Application.php');

    $app = new Application();

    $app->date_from = $_POST['datefrom'];
    $app->date_to   = $_POST['dateto'];
    $app->reason    = $_POST['reason'];

    $app->status    = 2;

    $app->user_id   = $_SESSION['user_id'];
    $app->username  = $_SESSION['username'];
    $app->lastname  = $_SESSION['lastname'];

    $app->name      = $app->username ." ".$app->lastname ;

    //exlude the weekends from the total days requested
    $start = strtotime($app->date_from);
    $end = strtotime($app->date_to );
    
    $count = 0;
    
    while(date('Y-m-d', $start) < date('Y-m-d', $end)){
      $count += date('N', $start) < 6 ? 1 : 0;
      $start = strtotime("+1 day", $start);
    }
    
    $app->days   = $count;  
    // $app->days      = date_diff(date_create($app->date_from),date_create($app->date_to ))->format("%Y");

    $to      = 'admin@ofportal.com';
    $subject = 'Time Off Request';
    $app->message = "Dear supervisor, employee {$app->name} requested for some time off, starting on
    {$app->date_from} and ending on {$app->date_to}, stating the reason:<br>{$app->reason}<br>
    Click on one of the below links to approve or reject the application:";

 
    $_SESSION['validationErrors'] = null;
    $_SESSION['vacationRequest'] = $_POST;

    include_once($appBasePath.'/data/validation/ApplicationValidator.php');
    $appValidator = new ApplicationValidator();



    if (!$appValidator->validate($app)) {
        $_SESSION['validationErrors'] = $appValidator->getErrors(); 

        header('Location: create_application.php');
        die();
    }

    include_once($appBasePath.'/services/application.php');
    ApplicationService::createApplication($app);
    
    mail($to, $subject, $app->message);
    header("Location: index.php");
    die;    
    
}

showCreateApplication();