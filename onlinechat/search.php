<?php
    session_start();
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $searchTerm = mysqli_real_escape_string($dbconnect, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($dbconnect, "SELECT * FROM registeration WHERE userid LIKE '%{$searchTerm}%' OR email LIKE '%{$searchTerm}%' ");
    if(mysqli_num_rows($sql) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>