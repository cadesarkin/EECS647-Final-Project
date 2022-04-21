<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "s133w404", "ahj3Hugh", "s133w404");

if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error); exit();
  echo "<h1>Fail</h1>";
}
else {
  //echo "<h1>Success</h1>";
}

$isSuccess=0;
$userEmail = $_POST["inputEmail"];
$userPassword = $_POST["inputPassword"];
$queryUser = "SELECT * FROM Users WHERE UserEmail='$userEmail'";
$result = $mysqli->query($queryUser);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $dbPassword = $row["UserPassword"];
      if($dbPassword == $userPassword)
      {
          $isSuccess=1;
      }
  }
} else {
  echo "0 results";
}



if ($isSuccess == 0) {
    header("Location: index.html");
} else 
{
    echo "<h1>Successss</h1>";
    header("Location: shop.html");
}

$mysqli->close();

?>