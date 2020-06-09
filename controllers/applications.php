<?php 
include_once '../boot.php';

if (!user_logged_in()) {
    header("Location: login");
    die;  
}

showApplications();