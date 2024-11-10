<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "latihanmvc", 3307);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}