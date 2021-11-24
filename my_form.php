<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Handling Request</title> 
</head> 
<body> 
 
<?php 
    session_start(); 
 
    if(isset($_POST["submit"])){ 
        $_SESSION['FirstSearchSession'] = $_POST["GoogleSearch"]; 
    } 
?> 
 
    <h3>Richard's Search Engine (Results on Same Page)</h3> 
    <form method="post" action="http://localhost/myphp/my_form.php"> 
        <input type="text" name="Search" value="<?php echo (isset($_SESSION['FirstSearchSession'])) ? $_SESSION['FirstSearchSession'] : '';?>"> 
        <input type="submit" name="submit" value="Search"> 
    </form> 
 
    <?php 
 
    //Regex Validation 
    if(isset ($_POST['submit'])){ 
        $form1Input = $_POST['GoogleSearch']; 
        #echo $form1Input; 
 
        // if (preg_match('/[^0-9]/', $form1Input)){ 
        //     echo 'Only Numbers are allowed'; 
        // } 
 
        // if (preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/', $form1Input)){ 
        //     echo 'Password should have at least one number and one special character.'; 
        // } 
 
        echo "<br>"; 
        echo "<br>"; 
 
        require __DIR__.'/database_credentials.php'; 
         
        $conn = new mysqli(servername, username, password, $dbname); 
         
        if ($conn->connect_error){ 
            die("Connection failed: " .$conn->connect_error); 
        } 
         
        $record = "SELECT Lab_id, Search_term FROM practical_lab_table WHERE Search_term = '$form1Input' "; 
        $result = $conn->query($record); 
         
        if ($result->num_rows > 0) { 
            // output data for each row 
            while($row = $result->fetch_assoc()) { 
            echo "Lab_Id: " . $row["Lab_id"]. " - Search Term: " . $row["Search_term"]; 
            echo "<tr>"; 
            echo "<td><a href='delete.php?id=".$row['Lab_id']."'> Delete </a></td>"; 
            echo "<td><a href='edit_form.php?id=".$row['Lab_id']."'> Edit </a></td>"; 
            echo "</tr>"; 
            echo "<br>"; 
            } 
        } else { 
            echo "0 results"; 
        } 
        $conn->close(); 
    } 
    ?> 
 
    <br> 
 
    <h3>Search Results (Results on Different Page)</h3> 
    <form method="post" action="results_page.php"> 
        <input type="text" name="Search2"> 
        <input type="submit" name="submit" value="Search"> 
        <br><br> 
    </form> 
</body> 
</html>