<?php
require_once 'includes/dbh.inc.php';

$name ="";
$author = "";

try {
    $query = "SELECT name FROM books;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    /*$query = "UPDATE users
              SET username = :username, email = :email, pwd = :pwd
              WHERE id = 6;
    ";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $password);*/



}
catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database test</title>
</head>
<body>

<p>THis is what I got from the database: <?php var_dump($results[0]);?></p>

</body>
</html>