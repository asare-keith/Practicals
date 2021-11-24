<!-- Practical K -->
<?php
require __DIR__.'/database_connection_test.php'; 
 
    $id = $_GET['id']; 
    echo $id; 
 
    $query = mysqli_query($conn, "SELECT * FROM practical_lab_table WHERE Lab_id = '$id'"); 
 
    $data = mysqli_fetch_array($query); 
 
    if(isset($_POST['update'])) //updates when button is clicked 
    { 
        $search_term = $_POST['search_term']; 
 
        $edit = mysqli_query($conn, "UPDATE practical_lab_table SET Search_term = '$search_term' WHERE Lab_id = '$id'"); 
 
        if($edit) 
        { 
            mysqli_close($conn); // Closes the  connection 
            header("location:my_form.php"); // redirects to my_form page 
            exit; 
        } 
        else 
        { 
            echo mysqli_error(); 
        }    
    }  
?> 
 
<h3>Update Data Below</h3> 
<form method="POST"> 
  New Search Term: <input type="text" name="search_term" value="<?php echo $data['Search_term']; ?>"><br> 
  <input type="submit" name="update" value="Update"> 
</form>