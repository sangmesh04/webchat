<?php
while($row = mysqli_fetch_assoc($query)){
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
$query2 = mysqli_query($dbconnect, $sql2);
$row2 = mysqli_fetch_assoc($query2);
if(mysqli_num_rows($query2) > 0) {
    $result = $row2['msg'];
}else{
    $result ="No message available";
}
(strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
if(isset($row2['outgoing_msg_id'])){
($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
}else{
$you = "";
}
($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";;
    $output .='<li><a href="chatbox.php?user_id='.$row['unique_id'].'"><div class="status-dot'. $offline .'" style="  line-height:40px;margin-left:-10px;margin-right:10px;font-size:10px;"><i class="fa fa-circle"></i></div><img src="images/'. $row['image'].' " alt="" style="width: 30px; height: 30px; border-radius: 50%;"> 
               <div class="details"><span style="font-size: 15px;font-weight: bolder;">'. $row['userid'].'</span>
               <p style="font-weight: lighter;color: gray;">'. $you . $msg .'</p> </div></a></li>';
    
}
?>