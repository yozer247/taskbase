<? //this is php ?>


<?php

$user = 'root';
$password = 'root';
$db = 'homespace';
$host = 'localhost';
$port = 8889;

include "sqli_connect.php";
// real connect to the MAMP mysql server

//echo an error message if sql connection is not complete
if(!$success){
  echo "Connection error: " . mysqli_connect_error();
}

//query
$sql = "SELECT * FROM tasks";

//fetch results
$result = mysqli_query($link,$sql);

//results turn into an array
//$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);







print_r($tasks);

?>




<!-- this is a HTML comment -->

<!DOCTYPE HTML> <!-- setup the HTML -->
<html>
<head>
  <meta charset="UTF-8"> <!-- can add more metadata here -->
  <title>Homespace</title>
</head>

<body>
  <h1><b>Welcome to your Homespace</b></h1>
  <p> Hello Nathan, <!-- username --> let's get started. </p>
  <p> This site will help you keep calm, and carry out tasks. I hope you're staying hydrated. <br><br></p>
  <p>You'll find your daily, weekly, and scheduled tasks below. Check the tick box to confirm completion and resume wholesomeness. <br> </p>
  <p> Remember, the game is in your mind. Strive to be good to those around you. </p>

<!-- random inspirational/motivational quotes? -->

  <h2>Tasks</h2>

<? if(mysqli_num_rows($result) > 0 ){
  while($row = mysqli_fetch_assoc($result)) {
    echo "Task Number: " . $row["ID"]. " - Title: " . $row["Title"]. " - Description: " . $row["Description"]. " - Deadline: ".$row["Deadline"]." - Priority: ".$row["Priority"]. "<br>";
  }
} else {
  echo "0 results";
}
//free result from memory
mysqli_free_result($result);

// close sql connection
mysqli_close($conn);
?>



<br><br><br><br>

<p> To add a task follow me to the following <a href="tasks.php">page~</a>

</body>
</html>
