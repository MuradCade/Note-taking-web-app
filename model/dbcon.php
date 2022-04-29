<?php
$hostname = "sql109.liveblog365.com";
$username = "lblog_31608817";
$pwd = "crzeq0ilkbqv";
$dbname = "lblog_31608817_notes";

$connection = mysqli_connect($hostname, $username, $pwd, $dbname);

if (!$connection) {
    // header("lo")
    echo "database Connection error";
    die();
}
