<!DOCTYPE html>
<html lang= "en">
    <head>
        <title></title>
    </head>
    <body>
        <div>
            <form action ="#" method="get">
                <input type="text" name="Search">
                <input type="Submit">

            </form>

    </div>
    <div>
    <html>


<form action="results_page.php" method="post">
<input type="text" name="Search">
                <input type="Submit">
</form>


</html>
    </div>
    <?php
    $searchinput=$_GET['Search'];
    echo $searchinput
    ?>
</body>
</html>