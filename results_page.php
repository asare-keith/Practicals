<!-- Practical Lab H --> 
<?php 
require __DIR__.'/database_credentials.php'; 
  $conn = new mysqli(servername, username, password, $dbname); 
 
  $SecondformInput = $_POST['Search2']; 
  $sql = "INSERT INTO practical_lab_table (Search_term) VALUES ('$SecondformInput')"; 
 
  if ($conn->query($sql) === TRUE) { 
    echo "New record created successfully: "; 
    echo $SecondformInput; 
  } else { 
    echo "Error: " . $sql. "<br" . $conn->error; 
  } 
 ?>