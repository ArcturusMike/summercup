<?php
error_reporting(0);
$db = mysqli_connect("localhost", "username", "password", "summercup21");

if (!$db) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
?>