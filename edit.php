<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/months.inc.php';


if (isset($_GET['id'])){
    $book_id = $_GET['id'];
}

$book_name= "";
$book_author= "";
$book_year = 2020;
$book_month = 0;
$book_recommended = "";
$book_genre = "";
$book_description = "";
$book_thoughts = "";
$book_cover = "";

if(!empty($book_id)){
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
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php
        if (isset($book_id)) {
            echo "Edit " . htmlspecialchars($book_name);
        } else {
            echo "Create Page";
        }
        ?>
    </title>

    <link rel="icon" type="image/x-icon" href="icons/logo_dark.svg" >

    <link rel="stylesheet" href="css/base_stylesheet.css">
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/fonts.css">

    <link rel="stylesheet" href="css/edit.css">
</head>
<body>

<header>
    <a href="index.php"><div class="logo"><img src="icons/logo_light.svg"></div></a>
    <h1>SidCity Book Club</h1>
    <span style="font-family: Bahnschrift,serif;">*A LOT OF PHOTOS OF SID READING INCOMING*</span>
</header>

<main>

    <div class="edit">

        <form>

            <label for="name">Name of the book :</label><br>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($book_name);?>"><br>

            <label for="author">Author :</label><br>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book_author);?>"><br>

            <label for="year">Year :</label><br>
            <input type="number" id="year" name="year" min="2020" value="<?php echo htmlspecialchars($book_year);?>"><br>


            <!-- Tady bude nejspíš potřeba dělat JS nebo něco podobného jiného, protože preselected se dělá pomocí atributu selected u specifické option ugh-->
            <label for="month">Month :</label><br>
            <select id="month" name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <br>

            <label for="recommended">Recommended by :</label><br>
            <input type="text" id="recommended" name="recommended" value="<?php echo htmlspecialchars($book_recommended);?>"> <br>

            <label for="genre">Genre :</label><br>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book_genre);?>"> <br>

            <label for="description">Book description :</label><br>
            <textarea id="description" name="description" ><?php echo htmlspecialchars($book_description);?></textarea> <br>

            <label for="thoughts">Book Club Thoughts :</label><br>
            <textarea id="thoughts" name="thoughts"><?php echo htmlspecialchars($book_thoughts);?></textarea> <br>

            <label for="cover">Book cover :</label><br>
            <input type="file" id="cover" name="cover"> <br>

            <?php
            if ($book_cover === ""){
                echo "No book cover";
            } else {
                echo "Current book cover: " . htmlspecialchars($book_cover);
            }
            ?>

            <div class="buttons">
                <input type="submit" value="SUBMIT" class="btn submit">
                <a href="<?php if (!isset($book_id)) { echo "index.php";} else { echo "page.php?id=".$book_id;}?>" class="btn back">BACK</a>
                <button onclick="" class="btn delete">DELETE</button>
            </div>

        </form>

    </div>

</main>

</body>
</html>