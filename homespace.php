<? //this is php ?>


<?php

$user = 'root';
$password = 'root';
$db = 'homespace';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

if(!$success){
  echo "Connection error: " . mysqli_connect_error();
}

if ($result = mysqli_query($link, "SELECT * FROM tasks")){
  printf("Select returned %d rows.\n", mysqli_num_rows($result));


mysqli_free_result($result);

}





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



<br><br><br><br>

<p> To add a task follow me to the following <a href="tasks.php">page~</a>

</body>
</html>
