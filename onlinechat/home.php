<?php 
session_start();
if(isset($_POST['submit1'])){
    $name = $_POST['userid'];
    $pass = $_POST['pass'];
    $encrypt_pass = md5($pass);
    $dbconnect = mysqli_connect('localhost','root','','294283');
    $result = mysqli_query($dbconnect, "SELECT * FROM registeration WHERE userid = '$name' && password = '$encrypt_pass' or email = '$name' && password ='$encrypt_pass'");
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
if ($count==1) 
{   
    $status = "Active now";
    $sql2 = mysqli_query($dbconnect, "UPDATE registeration SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
    if($sql2){
        $_SESSION['unique_id'] = $row['unique_id'];
    }else{
        echo "Something went wrong. Please try again!";
    }
}
}
        
    
else{
    
        echo "Please recheck your userid or password <br>
        Failed to Login!";
        header("location:loginfail.html");
}
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a friend to chat</title>
    <style>
        *{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0%;
            padding: 0%;
        }
        img{
            object-fit: cover;
        }
        .main{
            overflow: hidden;
            width: 60%;
            height: 80%;
            background-color: rgb(255, 255, 255);
            position:sticky;
            margin: 6% auto;
            padding: 5px;
            border-radius: 10px;
        }
        .container{
             
             background-image:url(R.gif);
              background-position: center;
              background-size: cover;
              position: fixed;
              width: 110%;
              height: 100%;
         }
    .footer{
        bottom: 0;
        position: fixed;
    }
    .footer .msg{
        width: 530px;
        height: 40px;
        margin: 60px 10px 60px 20px;
        border-radius: 10px;
        padding-left: 20px;
        border:2px solid rgb(0, 119, 128);
        font-size: 20px;
    }
    .footer .send{
       background: none;
       border: none;
       font-size: 40px;
       color: rgb(10, 94, 105);
      
    }
    .footer .send:hover{
        color: rgb(111, 194, 214);
        transition: .5s;
    }
    #dp{
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }
    .profile{
        display: flex;
        border-bottom: 1px solid gray;
        padding-bottom: 20px;
    }
    .profile .details{
        margin:auto auto auto 40px;
    }
    .profile a{
        text-decoration: none;
        color: white;
        font-weight: bolder;
        background-color: rgb(6, 97, 88);
        padding: 20px;
        border-radius: 10px;
    }
    .profile a:hover{
        background-color: rgb(160, 24, 0);
        transition: .6s;
    }
    .space .all-people ul li a{
        width: 400px;
        text-decoration: none;
        color: black;
        display: flex;
        padding:5px 30px 10px 20px;
        border-bottom: 1px solid rgba(179, 173, 173, 0.795);
        position: relative;
    }
    .space .all-people ul li a:hover{
        color: coral;
    }
    .space .all-people{
        overflow-y: scroll;
        max-width: 300px;
        height:480px;
    }
    .space .all-people ul li .details{
        padding: 0 10px 0px 20px;
    }
    .space .chat-area{
        width: 600px;
    }
    .space .top{
        display: flex;
    }
    ::-webkit-scrollbar{
        width: 10px;
    }
    .space .bodypart{
        display: flex;
    }
#search{
    height: 30px;
    margin-top: 10px;
    border-radius: 0px;
    outline: hidden;
    overflow: hidden;
    width: 270px;
    padding: 10px;
    border: 1px solid rgb(3, 70, 64);
}
.space .top .to-whom {
    display: flex;
    width: 670px;
}
.space .top .to-whom .details{
    padding: 10px 10px 10px 20px;
}
.chat-area{
  position: relative;
  min-height: auto;
  max-height: 400px;
  width: 300px;
  overflow-y: auto;
  padding: 10px 30px 20px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-area .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-area .chat{
  margin: 15px 0;
}
.chat-area .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-area .outgoing{
  display: flex;
}
.chat-area .outgoing .details{
  margin-left:auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: rgb(1, 65, 65);
  color: #fff;
  border-radius: 18px 18px 0 18px;
  margin: 5px 0px;
  width: fit-content;
}
.chat-area .incoming{
  display: flex;
  align-items:flex-end;
}
.chat-area .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: rgb(46, 45, 45);
  color: rgb(255, 255, 255);
  border-radius: 18px 18px 18px 0;
  width: fit-content;
  padding: 10px;
  margin: 5px 0px;
}
.status-dot{
        color:rgb(5, 140, 145);
        line-height:40px;
        margin-left:-10px;
        margin-right:10px;
       font-size:10px;
    }
    .status-dot.offline{
  color: #ccc;
}
    </style>
</head>
<body>
    <?php 
    $dbconnect = mysqli_connect('localhost','root','','294283');
            $sql = mysqli_query($dbconnect, "SELECT * FROM registeration WHERE userid = '$name' or email = '$name'");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
    ?>
    <div class="container">
    <div class="main">
        <div class="profile">
        <img src="images/<?php echo $row['image']; ?>" alt="" id="dp"> <div class="details"><span style="font-size: 30px;font-weight: bolder;"><?php echo $row['userid']; ?></span><p style="font-weight: lighter;color: gray;"><?php echo $row['status']; ?></p> </div>
        <a href="logout.php?logout_id=<?php echo $row['unique_id'];?>" action="logout.php">Log Out </a>
        </div>


<div class="space">
    <div class="top">
    <div class="to-whom" name="chat-box">
        <p style="padding-top: 10px;color:red;font-weight:bolder;margin-left:10px">Please select a friend to start chat...</p>
    </div>
    <div class="search">
        <input type="search" name="search" id="search" placeholder="search your friends here...">
    </div>
    </div>
    <div class="bodypart">
    <div class="chat-area">
<p style="font-size:30px;margin-top:50px;color:rgb(3, 95, 86);">
    Developer: <span style="color:#002b3d">Sangmeshwar Mahajan</span>
</p>
    </div>
    <div class="all-people">
        <ul class="users-list">
            
        </ul>
    </div>
    </div>
</div>

    
    </div>
    
    </div>
    <script>
       /* const toWhom = document.querySelector(".top .to-whom");
        setInterval(() =>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "backend/towhom.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          
            toWhom.innerHTML = data;
          
        }
    }
  }
  xhr.send();
}, 500);*/

    </script>
    <script>
        const searchBar = document.querySelector(".space .search input"),
        usersList = document.querySelector(".all-people .users-list");


        searchBar.onkeyup = () =>{
            let searchTerm = searchBar.value;
            let xhr = new XMLHttpRequest();
            if(searchTerm != ""){
            searchBar.classList.add("active");
           }else{
           searchBar.classList.remove("active");
           }
        xhr.open("POST", "backend/search.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;

        }
    }
}
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("searchTerm=" + searchTerm);
        }

        setInterval(() =>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "backend/people.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

    </script>
</body>
</html>
