
<?php

if(isset($_POST['submit'])){
    session_start();
    $name = $_POST['userid'];
    $email = $_POST['emailid'];
    $pass = $_POST['pass'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);
    $time = time();
    $new_img_name = $time.$img_name;
    $ran_id = rand(time(), 100000000);
    $status = "active";
    $encrypt_pass = md5($pass);
    
 
    $dbconnect = mysqli_connect('localhost','root','','294283');

    $sql = mysqli_query($dbconnect, "insert into registeration(	unique_id ,userid,email,password,image,status) values('$ran_id','$name','$email','$encrypt_pass','$new_img_name','$status')");
    
   
    if($sql && move_uploaded_file($tmp_name,"images/".$new_img_name)){
        $select_sql2 = mysqli_query($dbconnect, "SELECT * FROM registeration WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }
        echo "Registration Successful!";
        header("location:registration.html");
    }
else{
        echo "Please try to register using another userid or another email ID
             <br> Failed to Register!
             <br>Please try after some time"; 
}
}


?>
