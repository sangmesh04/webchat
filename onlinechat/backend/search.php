<?php
    session_start();
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($dbconnect, $_POST['searchTerm']);
    $output = "";
    $sql =  "SELECT * FROM registeration WHERE NOT unique_id = {$outgoing_id} AND ( userid LIKE '%{$searchTerm}%' OR email LIKE '%{$searchTerm}%') ";
    $query = mysqli_query($dbconnect, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>