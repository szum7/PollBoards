<?php
header("Content-Type: text/html; charset=utf-8");
$connection_id = new mysqli("localhost", "root", "password", "dbname");
if ($connection_id->connect_errno) {
    echo "Failed to connect to MySQL: (" . $connection_id->connect_errno . ") " . $connection_id->connect_errno;
}
$connection_id->set_charset("utf8");
?>