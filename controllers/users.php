<?php
include_once '../boot.php';

if (!user_logged_in()) {
    header("Location: login");
    die;
} else {
    if (!user_is_admin()) {
        header("Location: applications");
        die;
    }
}

showUsers();
