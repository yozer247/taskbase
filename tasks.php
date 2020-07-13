<? //this is a php comment ?>
<!-- this is a html comment -->


<?php

$user = 'root';
$password = 'root';
$db = 'inventory';
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


//test 12313213123 sqlite_changes

?>






<!DOCTYPE HTML> <!-- setup the HTML -->
<html>
<head>
  <meta charset="UTF-8"> <!-- can add more metadata here -->
  <title>Tasks Interaction</title>
</head>

<body>
  <h1>Tasks Setup</h1>
  <p>Here you can add, remove, and display tasks from the database.</p>

<form method="post" action="">
  <label for="title">Task Title:</label>
  <input type="text" id="title" name="title"><br><br>
  <label for="priority">Priority of Task:</label>
  <select id="priority" name="priority">
    <option value="High">High</option>
    <option value="High">Medium</option>
    <option value="High">Low</option>
  </select>
  <br><br>
  <label for="description">Description:</label>
  <input type="text" id="description" name="description"><br><br> <!-- make this bigger -->
  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline"><br><br>
  <input type="submit" value="Submit">
</form>




</body>
</html>
