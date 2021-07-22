<<<<<<< HEAD
<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "294283";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
=======
<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "294283";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
>>>>>>> refs/remotes/origin/master
