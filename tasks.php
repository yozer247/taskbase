<? //this is a php comment ?>
<!-- this is a html comment -->


<?php

include "sqli_connect.php";
// real connect to the MAMP mysql server
//throw error if connection failed
if(!$success){
  echo "Connection error: " . mysqli_connect_error();
}

//setting blank variables for first run of file
$errors = ["Title"=>"","priority"=>"", "description"=>"","date"=>""];
$taskTitle = "";
$taskDescription = "";
$taskPriority= "";
$taskDeadline = "";

//if POST is being used, process the post data
if (isset($_POST["Submit"])){

  //sanitize incoming user input
  $taskTitle = filter_var($_POST["title"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  $taskPriority = $_POST["priority"];
  $taskDescription = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
  $taskDeadline = $_POST["deadline"];


  if(empty($taskTitle)){ //validation if empty, then regex
  $errors["title"] = "Title must be filled in!";
  }
//  else{
  // if(!preg_match("/^[a-zA-Z\s]+$",$taskTitle)){
    //  $errors["title"] = "Letters and spaces only";  //having some issues with this error always showing, will investigate later
    //}
  //}

  if(empty($taskDescription)){ //validation if empty, then regex
  $errors["description"] = "Description must be filled in!";
  }
  //else{
    //if(!preg_match('/^[a-zA-Z\s]+$',$taskDescription)){
      //$errors["description"] = "Letters and spaces only";
    //}
  //}

  if(empty($taskPriority)){ //making sure priority is chosen
    $errors["priority"] = "Must select a priority level!";
  }

  if(empty($taskDeadline)){ //making sure deadline is filled in
    $errors["deadline"] = "Must enter a date!";
  }

  if(strtotime($taskDeadline) < time() ){ //making sure deadline is in the future
    $errors["deadline"] = "Must enter a date in the future!";
  }

  if(!array_filter($errors)){ //if there are no errors, proceed with submission

    //$taskTitle = mysqli_real_escape_string($link, $_POST["title"])

    $sql = "INSERT INTO tasks(title,priority,description,deadline) VALUES('$taskTitle','$taskPriority','$taskDescription','$taskDeadline')"; //inserting data via query

    //do insert query and check if usccessful, then redirect back home
    if(mysqli_query($link,$sql)){
      header("Location: homespace.php");
    }else{
      echo "query error: " . mysqli_error($conn);
    }
  }
} //end of IF POST


?>


<!DOCTYPE HTML> <!-- setup the HTML -->
<html>
<head>
  <meta charset="UTF-8"> <!-- can add more metadata here -->
  <title>Tasks Input</title>
</head>

<body>
  <h1>Tasks Setup</h1>
  <p>Here you can add, remove, and display tasks from the database.</p>

<form method="post" action="tasks.php">
  <label for="title">Task Title:</label>
  <input type="text" id="title" name="title" value="<?= htmlspecialchars($taskTitle)?>">
  <div> <?= $errors["title"]; ?> </div><br>
  <label for="priority">Priority of Task:</label>
  <select id="priority" name="priority">
    <option value="none" selected disabled hidden>Select an Option </option>
    <option value="High">High</option>
    <option value="Medium">Medium</option>
    <option value="Low">Low</option>
  </select>
  <div> <?= $errors["priority"]; ?></div>
  <br>
  <label for="description">Description:</label>
  <input type="text" id="description" name="description" value="<?= htmlspecialchars($taskDescription)?>"> <!-- make this bigger -->
  <div> <?= $errors["description"]; ?> </div><br>
  <label for="deadline">Deadline:</label>
  <input type="date" id="deadline" name="deadline" value="<?= $taskDeadline?>">
  <div> <?= $errors["deadline"]; ?></div><br>
  <input type="submit" name="Submit" value="Submit">
</form>

<div> <br> Last Task Submitted: <?= "$taskTitle , $taskPriority , $taskDescription , $taskDeadline" ?>  </div>

</body>
</html>
