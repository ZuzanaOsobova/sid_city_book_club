<?php
require_once 'dbh.inc.php';

if (!empty($_GET['id'])){
    //TODO Tohle nejspíš potřebuje zčeknout a upravit, aby to bylo ok
    $book_id = (int)$_GET['id'];

    //TODO check jestli je user přihlášen

    $query = "DELETE FROM books WHERE id = :book_id";
    $stmt = $pdo->prepare($query);
    $stmt-> bindParam(':book_id', $book_id);

    $smt = $stmt->execute();

    header("Location: ../index.php");


} else {
    header("Location: ../index.php");
}

