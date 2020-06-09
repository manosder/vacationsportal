<?php

include_once($appBasePath.'/services/application.php');
include_once($appBasePath.'/services/user.php');

function showLogin() 
{
    global $appBasePath;
    include_once($appBasePath.'/views/login.php');
}
function showSignUp() 
{
    global $appBasePath;
    include_once($appBasePath.'/views/signup.php');
}
function showIndex() 
{
    if(user_is_admin()) {
        header("Location: users");
    } else {
        header("Location: applications");
    }
}
function showApplications() 
{
    $applications = ApplicationService::getAllApplicationsForLoggedInUser();
    global $appBasePath;
    include_once($appBasePath.'/views/applications_table.php');
}
function showCreateApplication()
{
    global $appBasePath;
    include_once($appBasePath.'/views/create_application.php');
}
function showMessages() 
{
    global $appBasePath;

    if(user_is_admin()) {
        $messages = ApplicationService::getAllPendingMessages();
    } else {
        $messages = ApplicationService::getAllApplicationsForLoggedInUser();
    }

    include_once($appBasePath.'/views/messages.php');
}
function showUsers() 
{
    $userlist = UserService::getAll();
    global $appBasePath;
    include_once($appBasePath.'/views/users_table.php');
}
function showCreateUser() 
{
    global $appBasePath;
    include_once($appBasePath.'/views/create_user.php');
}
function showUpdateUser() 
{
    global $appBasePath;
    include_once($appBasePath.'/views/update_user.php');
}