<?php
    session_start();
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $active = 'active now';
    $sql = mysqli_query($dbconnect, "SELECT * FROM registeration");
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){
        include_once "data.php";
    }
    
    echo $output;
?>