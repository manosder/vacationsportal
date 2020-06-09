<?php

/* Attempt to connect to MySQL database */
$con = mysqli_connect(
    $config['database_host'], 
    $config['database_username'], 
    $config['database_password'], 
    $config['database_name']
);

// Check connection
if($con === false){
    die("ERROR: Failed to connect. " . mysqli_connect_error());
}