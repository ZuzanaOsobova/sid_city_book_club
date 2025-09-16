<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>

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
            <input type="text" id="name" name="name"><br>

            <label for="author">Author :</label><br>
            <input type="text" id="author" name="author"><br>

            <label for="year">Year :</label><br>
            <input type="number" id="year" name="year" min="2020"><br>

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
            <input type="text" id="recommended" name="recommended"> <br>

            <label for="genre">Genre :</label><br>
            <input type="text" id="genre" name="genre"> <br>

            <label for="description">Book description :</label><br>
            <textarea id="description" name="description" rows="5" cols="50"></textarea> <br>

            <label for="thoughts">Book Club Thoughts :</label><br>
            <textarea id="thoughts" name="thoughts" rows="5" cols="50"></textarea> <br>

            <label for="cover">Book cover :</label><br>
            <input type="file" id="cover" name="cover"> <br>

            <div class="buttons">
                <input type="submit" value="SUBMIT" class="btn submit">
                <a href="index.php" class="btn back">BACK</a>
                <button onclick="" class="btn delete">DELETE</button>
            </div>

        </form>

    </div>

</main>

</body>
</html>