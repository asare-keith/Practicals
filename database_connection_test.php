<!-- Keith Asare-->
<!--16002023-->
<!-- Practical F -->
<?php

require __DIR__. "/database_credentials.php";
// Create connection
$conn = new mysqli(servername, username, password,dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Successfully Connected";
?>