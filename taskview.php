<? //this is a php comment ?>
<!-- this is a html comment -->


<?php

include "sqli_connect.php";
// real connect to the MAMP mysql server
//throw error if connection failed
if(!$success){
  echo "Connection error: " . mysqli_connect_error();
}



//view a single entry, more space for the info, interaction buttons -> delete, view next, previous, edit?

?>


<!DOCTYPE HTML> <!-- setup the HTML -->
<html>
<head>
  <meta charset="UTF-8"> <!-- can add more metadata here -->
  <title>Tasks Interaction</title>
</head>

<body>
  <h1>Tasks Setup</h1>

</body>
</html>
