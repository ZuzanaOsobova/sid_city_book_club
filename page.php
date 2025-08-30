<?php
require_once 'includes/dbh.inc.php';

$book_id = 1;

$book_name="";
$book_author="";
$book_year = 0;
$book_month = 0;
$book_recommended = "";
$book_genre = "";
$book_description = "";
$book_thoughts = "";

//working help
$book_cover = "images/dune.jpg";



try {
    $query = "SELECT * FROM books WHERE id = :book_id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":book_id", $book_id);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $item) {
        $book_name = $item['name'];
        $book_year = $item['year'];
        $book_author = $item['author'];
        $book_month = $item['month'];
        $book_recommended = $item['recommended'];
        $book_genre = $item['genre'];
        $book_description = $item['description'];
        $book_thoughts = $item['thoughts'];
    }


}
catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icons/logo_dark.svg" >
    <title></title>

    <link rel="stylesheet" href="css/base_stylesheet.css">
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/book_page.css">
</head>
<body>

<header>
    <a href="index.html"><div class="logo"><img src="icons/logo_light.svg"></div></a>
    <h1>SidCity Book Club</h1>
    <span style="font-family: Bahnschrift,serif;">*A LOT OF PHOTOS OF SID READING INCOMING*</span>
</header>

<main>

    <a href="index.html" class="back_button"><img src="icons/arrow_left.svg"> BACK</a>

    <div class="book_page">

        <div class="image"><img src="images/dune.jpg"></div>

        <div class="book_info">
            <h2><?php echo $book_name?></h2>

            <div class="info">
                <span class="info_label">Author: </span>
                <span class="info_text"><?php echo $book_author?></span>
            </div>

            <div class="info">
                <span class="info_label">Year read: </span>
                <span class="info_text"><?php echo $book_year?></span>
            </div>

            <div class="info">
                <span class="info_label">Month read: </span>
                <span class="info_text">
                    <?php
                    switch ($book_month){
                        case 1: echo "January"; break;

                        case 2: echo "February"; break;

                        case 3: echo "March"; break;

                        case 4: echo "April"; break;

                        case 5: echo "May"; break;

                        case 6: echo "June"; break;

                        case 7: echo "July"; break;

                        case 8: echo "August"; break;

                        case 9: echo "September"; break;

                        case 10: echo "October"; break;

                        case 11: echo "November"; break;

                        case 12: echo "December"; break;
                    }
                    ?>
                </span>
            </div>

            <div class="info">
                <span class="info_label">Recommended by: </span>
                <span class="info_text"><?php echo $book_recommended?></span>
            </div>

            <div class="info">
                <span class="info_label">Genre: </span>
                <span class="info_text"><?php echo $book_genre?></span>
            </div>

            <div class="info">
                <span class="info_label">Book description: </span>
                <p class="info_text"><?php echo $book_description?></p>
            </div>

            <div class="info">
                <span class="info_label">Club thoughts: </span>
                <span class="info_text"><?php echo $book_thoughts?></span>
            </div>
        </div>







    </div>





</main>



</body>
</html>