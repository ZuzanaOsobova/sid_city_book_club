<?php

$dbh = "mysql:host=localhost;dbname=sid_city_book_club";


//jméno a heslo, tyhle se mění na základě databáze
$dbUsername = "root";
$dbPassword = "";


try {
    $pdo = new PDO($dbh, $dbUsername, $dbPassword);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {

    // Print an error message to indicate failure to connect to DB
    echo "Connection failed: " . $e->getMessage();
}