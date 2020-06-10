<?php
include_once '../boot.php';

if (!user_logged_in() || user_is_admin()) {
    header("Location: login");
    die;
}

showApplications();
