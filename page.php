<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/months.inc.php';



//TODO tady asi kontrola, že ID je v pohodě
$book_id = $_GET['id'];

$book_name="";
$book_author="";
$book_year = 0;
$book_month = 0;
$book_recommended = "";
$book_genre = "";
$book_description = "";
$book_thoughts = "";
$book_cover = "";



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
        $book_cover = $item['cover'];
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
    <title><?php echo $book_name?></title>

    <link rel="stylesheet" href="css/base_stylesheet.css">
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/book_page.css">
</head>
<body>

<header>
    <a href="index.php"><div class="logo"><img src="icons/logo_light.svg"></div></a>
    <h1>SidCity Book Club</h1>
    <span style="font-family: Bahnschrift,serif;">*A LOT OF PHOTOS OF SID READING INCOMING*</span>
</header>

<main>

    <a href="index.php" class="back_button"><img src="icons/arrow_left.svg"> BACK</a>

    <!-- TODO tady se pokusit opravit layout obrázku -->
    <div class="book_page">

        <!-- TODO upravit, aby když není obrázek, tak to nezabíralo místo a book_info se roztáhlo -->
        <div class="image"><img src="images/<?php echo $book_cover?>"></div>

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
                    echo months($book_month);
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

    <!-- TODO schovat link pouze pro přihlášené uživatele -->
    <a href="edit.php?id=<?php echo $book_id;?>" class="back_button" id="edit_btn">EDIT</a>

</main>

</body>
</html>