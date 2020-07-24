<? //this is a php comment ?>
<!-- this is a html comment -->


<?php

//connecting to the database
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

?>
