<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/months.inc.php';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icons/logo_dark.svg" >
    <title>SidCity Book Club</title>


    <link rel="stylesheet" href="css/base_stylesheet.css">
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/book_table.css">

</head>
<body>

<header>
    <a href="index.php"><div class="logo"><img src="icons/logo_light.svg"></div></a>
    <h1>SidCity Book Club</h1>
    <span style="font-family: Bahnschrift,serif;">*A LOT OF PHOTOS OF SID READING INCOMING*</span>
</header>

<main>

    <h2>About</h2>
    <div class="about">
        <p>Hello there Traveller.</p>
        <p>This is website dedicated to the SidCity Book Club, which we are having over at Discord. We have read quite a few books, so I have decided to create a website where we can store them all, see when we read what and how we liked it.</p>
    </div>


    <div class="book_table">
        <h2>Books</h2>

        <table>
            <thead>
            <tr>
                <th scope="col" class="year">YEAR</th>
                <th scope="col" class="month">MONTH</th>
                <th scope="col" class="book">BOOK</th>
                <th scope="col" class="author">AUTHOR</th>
                <th scope="col" class="more">INFO</th>
            </tr>
            </thead>

            <tbody>

            <?php

            try {
                $query = "SELECT * FROM books;";

                $stmt = $pdo->prepare($query);

                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $item) {
                    ?>
                    <tr>
                        <td class="year"><?php echo $item['year']?></td>
                        <td class="month"><?php months($item['month']); ?></td>
                        <td class="book"><?php echo $item['name']?></td>
                        <td class="author"><?php echo $item['author']?></td>
                        <td class="more"><a href="page.php?id=<?php echo $item['id']?>">MORE<img src="icons/arrow_right.svg"></a></td>
                    </tr>


                <?php
                }


            }
            catch (PDOException $e) {
                die("Query failed: " . $e->getMessage());
            }

            ?>


            </tbody>

        </table>


    </div>

</main>


</body>
</html>