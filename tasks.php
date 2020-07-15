<? //this is a php comment ?>
<!-- this is a html comment -->

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


$errors = ["Title"=>"","priority"=>"", "description"=>"","date"=>""];
$taskTitle = "";
$taskDescription = "";
$taskPriority= "";
$taskDeadline = "";

//if empty do error message (validation), sanitize filter, put into SQL
//filter_var check can pass or fail, show error from that
//use regex to validate strings?
//next up, form adding to the mysql database


if (isset($_POST["Submit"])){ //set vars, do validation, then submit

  $taskTitle = filter_var($_POST["title"],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
  $taskPriority = $_POST["priority"];
  $taskDescription = filter_var($_POST["description"],FILTER_SANITIZE_STRING);
  $taskDeadline = $_POST["deadline"]; //must be greater than current date


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

  if(empty($taskPriority)){
    $errors["priority"] = "Must select a priority level!";
  }

  if(empty($taskDeadline)){
    $errors["deadline"] = "Must enter a date!";
  }

  if(strtotime($taskDeadline) < time() ){
    $errors["deadline"] = "Must enter a date in the future!";
  }

  if(!array_filter($errors)){
    header("Location: homespace.php");
  }




} //end of IF POST


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
