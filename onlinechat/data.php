<?php
while($row = mysqli_fetch_assoc($sql)){
    $output .='<li><a href="#chat-box'.$row['userid'].'"><img src="images/'. $row['image'].' " alt="" style="width: 30px; height: 30px; border-radius: 50%;"> 
               <div class="details"><span style="font-size: 15px;font-weight: bolder;">'. $row['userid'].'</span>
               <p style="font-weight: lighter;color: gray;">'.$row['status'].'</p> </div></a></li>';
}
?>