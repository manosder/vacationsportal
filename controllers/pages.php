<?php

include_once($appBasePath . '/services/application.php');
include_once($appBasePath . '/services/user.php');

function renderView($viewFile)
{
    global $appBasePath;

    $viewFilePath = $appBasePath . '/views/' . $viewFile . '.php';
    if (!file_exists($viewFilePath)) {
        throw new \Exception('File does not exist');
    }

    include_once($viewFilePath);
}

function showLogin()
{
    renderView('login');
}

function showSignUp()
{
    renderView('signup');
}

function showIndex()
{
    if (user_is_admin()) {
        header("Location: users");
    } else {
        header("Location: applications");
    }
}

function showApplications()
{
    $applications = ApplicationService::getAllApplicationsForLoggedInUser();
    global $appBasePath;
    include_once($appBasePath . '/views/applications_table.php');
}

function showCreateApplication()
{
    renderView('create_application');
}

function showMessages()
{
    global $appBasePath;

    if (user_is_admin()) {
        $messages = ApplicationService::getAllPendingMessages();
    } else {
        $messages = ApplicationService::getAllApplicationsForLoggedInUser();
    }

    include_once($appBasePath . '/views/messages.php');
}

function showUsers()
{
    $userlist = UserService::getAll();
    global $appBasePath;
    include_once($appBasePath . '/views/users_table.php');
}

function showCreateUser()
{
    renderView('create_user');
}

function showUpdateUser()
{
    renderView('update_user');
}
