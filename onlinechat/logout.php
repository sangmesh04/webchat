<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        $dbconnect = mysqli_connect('localhost','root','','294283');
        $logout_id = mysqli_real_escape_string($dbconnect, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($dbconnect, "UPDATE registeration SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: main.php");
            }
        }else{
            header("location: home.php");
        }
    }else{
        header("location: main.php");
    }

?>
