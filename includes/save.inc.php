<?php
require_once 'dbh.inc.php';

//Upravit handlení těchto user data, ničemu z toho nevěř, ale teď nevím, jak přesně to udělat

if (!empty($_POST['id'])){
    $book_id = $_POST['id'];
} else {
    $book_id = "BITCH";
}

$book_name= $_POST["name"];
$book_author= $_POST["author"];
$book_year = $_POST["year"];
$book_month = $_POST["month"];
$book_recommended = $_POST["recommended"];
$book_genre = $_POST["genre"];
$book_description = $_POST["description"];
$book_thoughts = $_POST["thoughts"];
//$book_cover = $_POST["cover"];

echo $book_name . "<br>";
echo $book_id . "<br>";


if(!empty($book_id)){
    try {
        $query = "
                UPDATE books SET
                                 
                name = :book_name,
                year = :book_year,
                author = :book_author,
                month = :book_month,
                recommended = :book_recommended,
                genre = :book_genre,
                description = :book_description,
                thoughts = :book_thoughts,
                
                --cover = :book_cover 
                      
                WHERE id = :book_id;
                      
             ";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":book_name", $book_name);
        $stmt->bindParam(":book_year", $book_year);
        $stmt->bindParam(":book_author", $book_author);
        $stmt->bindParam(":book_month", $book_month);
        $stmt->bindParam(":book_recommended", $book_recommended);
        $stmt->bindParam(":book_genre", $book_genre);
        $stmt->bindParam(":book_description", $book_description);
        $stmt->bindParam(":book_thoughts", $book_thoughts);

        //$stmt->bindParam(":book_cover", $book_cover);


        $stmt->bindParam(":book_id", $book_id);

        $stmt->execute();

        header("Location:../page.php?id=".$book_id);


    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}