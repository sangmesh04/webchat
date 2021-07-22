<?php
    session_start();
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $active = 'active now';
    $sql = mysqli_query($dbconnect, "SELECT * FROM registeration");
    $output = "";
    $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql) == 2){
        $output .= '<img src="images/'. $row['image'].'" alt="" style="margin-top: 15px;width: 35px; height: 35px; border-radius: 50%;"> <div class="details"><span style="font-size: 18px;font-weight: bolder;">'.$row['userid'].'</span><p style="font-weight: lighter;color: gray;">'. $row['status'].'</p> </div>';
    }elseif(mysqli_num_rows($sql) == 8){
        $output .= "Please select user for chat!";
    }
    
    echo $output;
?>