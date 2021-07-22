<?php
    session_start();
     $hostname = "localhost";
     $username = "root";
     $password = "";
     $dbname = "294283";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM registeration WHERE NOT unique_id = {$outgoing_id} ORDER BY userid DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>