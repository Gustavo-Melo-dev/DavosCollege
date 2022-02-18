<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "davos";
$port = 3306;

try {
    $connect = new PDO("mysql:host=$host; port=$port; dbname=$dbname; user=$user; pass=$pass;");
} catch(PDOException $erro) {
    echo "Connection not found. " . $erro->getMessage();
}