<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        $dbconnect = mysqli_connect('localhost','root','','294283');
        $outgoing_id = mysqli_real_escape_string($dbconnect, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($dbconnect, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($dbconnect, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($dbconnect, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die();
        }
    }else{
        header("location: main.php");
    }


    
?>