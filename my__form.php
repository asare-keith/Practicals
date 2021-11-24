<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>
<body>
    <!-- Shows the submission results on this same page -->
    <h1>Search 1</h1>
    <?php
    session_start();
    if(isset($_GET["search"])){
        $keyword = $_GET["search"];
    }
    $_SESSION["Search_Term"] = $keyword;
    ?>
    <form method="GET">
        <input type="text" placeholder="search...." name="search" value="<?php echo $keyword?>">
        <input type="submit" value="search"
    </form>
    <!-- Results from the first form -->
    <?php echo $keyword;?>
    <br>
    <br>
    <!-- Shows the submission results on another page -->
    <h1>Search 2</h1><br>
    <form method="POST" action="results_page.php">
        <input type="text" placeholder="search...." name="search">
        <input type="submit" value="search"
    </form>
</body>
</html>