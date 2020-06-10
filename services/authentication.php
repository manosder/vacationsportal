<?php

function user_logged_in()
{
    return isset($_SESSION['user_id']);
}

function user_is_admin()
{
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        return true;
    }
    return false;
}
