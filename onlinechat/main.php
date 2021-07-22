<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <style>
        *{
            margin: 0;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
        }
        #load{
    margin-top: 15px;
      font-size: 50px;
      text-align: center;
      color: #62bcc2;
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgb(255, 254, 254) url("R.gif") no-repeat center;
      background-size: cover;
        }
        .container{
             
            background-image:url(R.gif);
             background-position: center;
             background-size: cover;
             position: fixed;
             width: 110%;
             height: 100%;
        }
        .main{
            overflow: hidden;
            width: 380px;
            height: 550px;
            background-color: rgb(255, 255, 255);
            position:sticky;
            margin: 6% auto;
            padding: 5px;
            border-radius: 10px;
        }
        .button-box{
          width: 220px;
          margin: 35px auto;
          position: relative;
          box-shadow: 0 0 10px 0px rgba(218, 208, 152, 0.98) ;
          border-radius: 30px;
        }
        .toggle{
            cursor: pointer;
            padding: 10px 30px;
            position: relative;
            background: transparent;
            outline: none;
            border: 0;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to right, rgb(102, 226, 199),rgb(12, 194, 226));
            border-radius: 30px;
            transition: .5s;
        }

        .input{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        #input,#pass,#con_pass{
            color: rgb(7, 4, 29);
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 1px solid rgb(5, 80, 94);
            outline: none;
            background: transparent;
        }
        #submit{
            color: white;
            position:absolute;
            padding: 10px 30px;
            width: 85%;
            display: block;
            cursor: pointer;
            margin:auto;
            background: linear-gradient(to right, rgb(2, 65, 65),rgb(0, 124, 128));
            border: 0;
            outline: none;
            border-radius: 30px;
            margin-bottom: 10px;
           
        }
        #submit:hover{
            opacity: 0.8;
        }
        #check{
            margin: 30px 10px 30px 0;
            top: 10px;
        }
        span{
            color: rgb(7, 7, 7);
            font-size: 12px;
            bottom: 30px;
            position: absolute;
        }
        #login{
            left: 50px;
        }
        #register{
            left: 450px;
        }
        #condition{
            font-size: 12px;
        }
        @media  screen and (max-width:400px) {
            .main{
                width: 100%;
                
            }
            
        }
        #register{
            overflow-y: scroll;
        }
        ::-webkit-scrollbar{
            width: 10px;
        }
        .head{
            font-size: 30px;
            font-weight:600;
            color: rgb(1, 49, 49);
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-bottom: 1px solid rgb(108, 121, 121);
            padding: 30px 10px 8px 15px;
        }
      
    </style>
</head>
<body onload="loadend()">
    <div id="load">Loading... Please Wait</div>
    <div class="container">
        <div class="main">
            <div class="head">Web Chat Application</div>
                <div class="button-box">
                    <div id="btn"></div>
                <button type="button" class="toggle" onclick="register()" style="font-weight: bolder;">Login</button>
                <button type="button" class="toggle" onclick="login()" style="font-weight: bolder;">Register</button>
                </div>
                <section class="form login">
            <form action="home.php" class="input" id="login" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="text" name="userid" id="input" placeholder="Enter User ID or Email ID" required><br>
            <input type="password" name="pass" id="input" placeholder="Enter Password" required><br>
            <input type="checkbox" name="check" id="check"><span>Remember me</span><br>
            <div class="field button"><input type="submit" value="Join to Chat" id="submit" name="submit1" style="font-weight: bolder;"></div>
            </form>
    </section>
            <section class="form signup">
            <form action="index.php" class="input" id="register" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="text" name="userid" id="input" placeholder="Enter User ID" required><br>
                <input type="email" name="emailid" id="input" placeholder="Enter Email ID" required><br>
                <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" required><br>
                <input type="password" name="pass1" id="con_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Confirm Password" required>
                <div id="condition">Password should include atleast 1 lowercase, 1 uppercase, 1 number and have minimum length 8 </div><br>
                <div style="font-weight: 500;">Upload your profile image </div><input type="file" name="image" accept="image/*" id="" required><br>
                
                <input type="checkbox" name="check" id="check" required><span>I agree all terms and conditions</span>
                <input type="submit" value="Register" id="submit" onclick="return validate()" name="submit" style="font-weight: bolder;">
          
                </form>
    </section>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        var myInput = document.getElementById("pass");
        var conpass = document.getElementById("con_pass");

       function validate(){
           if (myInput.value == ''){
               alert("Password can't be empty");
               return false;
           }
           var lowerCaseLetters = /[a-z]/g;
              if(myInput.value.match(lowerCaseLetters)) {
                
              } else {
                alert('Password should include lower case!');
                return false;
            }
            
              
              var upperCaseLetters = /[A-Z]/g;
              if(myInput.value.match(upperCaseLetters)) {
                
              } else {
               alert('Password should include uppercase!');
               return false;
              }
            
              
              var numbers = /[0-9]/g;
              if(myInput.value.match(numbers)) {
                
              } else {
                alert('Password should include number!');
                return false;
              }
            
              
              if(myInput.value.length >= 8) {
                
              } else {
                alert('Password should have minimum 8 character!');
                return false;
              }
              if((myInput.value) == (conpass.value)){
                  
              }else{
                  alert('Both passwords should match!');
                  return false;
              }
       }


        function login(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";

        }
        function register(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";

        }

    </script>
    <script>
        var preload = document.getElementById("load");
        function loadend(){
          preload.style.display = "none";
        }
      </script>
</body>
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <style>
        *{
            margin: 0;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
        }
        #load{
    margin-top: 15px;
      font-size: 50px;
      text-align: center;
      color: #62bcc2;
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgb(255, 254, 254) url("R.gif") no-repeat center;
      background-size: cover;
        }
        .container{
             
            background-image:url(R.gif);
             background-position: center;
             background-size: cover;
             position: fixed;
             width: 110%;
             height: 100%;
        }
        .main{
            overflow: hidden;
            width: 380px;
            height: 550px;
            background-color: rgb(255, 255, 255);
            position:sticky;
            margin: 6% auto;
            padding: 5px;
            border-radius: 10px;
        }
        .button-box{
          width: 220px;
          margin: 35px auto;
          position: relative;
          box-shadow: 0 0 10px 0px rgba(218, 208, 152, 0.98) ;
          border-radius: 30px;
        }
        .toggle{
            cursor: pointer;
            padding: 10px 30px;
            position: relative;
            background: transparent;
            outline: none;
            border: 0;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to right, rgb(102, 226, 199),rgb(12, 194, 226));
            border-radius: 30px;
            transition: .5s;
        }

        .input{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        #input,#pass,#con_pass{
            color: rgb(7, 4, 29);
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 1px solid rgb(5, 80, 94);
            outline: none;
            background: transparent;
        }
        #submit{
            color: white;
            position:absolute;
            padding: 10px 30px;
            width: 85%;
            display: block;
            cursor: pointer;
            margin:auto;
            background: linear-gradient(to right, rgb(2, 65, 65),rgb(0, 124, 128));
            border: 0;
            outline: none;
            border-radius: 30px;
            margin-bottom: 10px;
           
        }
        #submit:hover{
            opacity: 0.8;
        }
        #check{
            margin: 30px 10px 30px 0;
            top: 10px;
        }
        span{
            color: rgb(7, 7, 7);
            font-size: 12px;
            bottom: 30px;
            position: absolute;
        }
        #login{
            left: 50px;
        }
        #register{
            left: 450px;
        }
        #condition{
            font-size: 12px;
        }
        @media  screen and (max-width:400px) {
            .main{
                width: 100%;
                
            }
            
        }
        #register{
            overflow-y: scroll;
        }
        ::-webkit-scrollbar{
            width: 10px;
        }
        .head{
            font-size: 30px;
            font-weight:600;
            color: rgb(1, 49, 49);
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-bottom: 1px solid rgb(108, 121, 121);
            padding: 30px 10px 8px 15px;
        }
      
    </style>
</head>
<body onload="loadend()">
    <div id="load">Loading... Please Wait</div>
    <div class="container">
        <div class="main">
            <div class="head">Web Chat Application</div>
                <div class="button-box">
                    <div id="btn"></div>
                <button type="button" class="toggle" onclick="register()" style="font-weight: bolder;">Login</button>
                <button type="button" class="toggle" onclick="login()" style="font-weight: bolder;">Register</button>
                </div>
                <section class="form login">
            <form action="home.php" class="input" id="login" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="text" name="userid" id="input" placeholder="Enter User ID or Email ID" required><br>
            <input type="password" name="pass" id="input" placeholder="Enter Password" required><br>
            <input type="checkbox" name="check" id="check"><span>Remember me</span><br>
            <div class="field button"><input type="submit" value="Join to Chat" id="submit" name="submit1" style="font-weight: bolder;"></div>
            </form>
    </section>
            <section class="form signup">
            <form action="index.php" class="input" id="register" method="POST" enctype="multipart/form-data" autocomplete="off">
                <input type="text" name="userid" id="input" placeholder="Enter User ID" required><br>
                <input type="email" name="emailid" id="input" placeholder="Enter Email ID" required><br>
                <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password" required><br>
                <input type="password" name="pass1" id="con_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Confirm Password" required>
                <div id="condition">Password should include atleast 1 lowercase, 1 uppercase, 1 number and have minimum length 8 </div><br>
                <div style="font-weight: 500;">Upload your profile image </div><input type="file" name="image" accept="image/*" id="" required><br>
                
                <input type="checkbox" name="check" id="check" required><span>I agree all terms and conditions</span>
                <input type="submit" value="Register" id="submit" onclick="return validate()" name="submit" style="font-weight: bolder;">
          
                </form>
    </section>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        var myInput = document.getElementById("pass");
        var conpass = document.getElementById("con_pass");

       function validate(){
           if (myInput.value == ''){
               alert("Password can't be empty");
               return false;
           }
           var lowerCaseLetters = /[a-z]/g;
              if(myInput.value.match(lowerCaseLetters)) {
                
              } else {
                alert('Password should include lower case!');
                return false;
            }
            
              
              var upperCaseLetters = /[A-Z]/g;
              if(myInput.value.match(upperCaseLetters)) {
                
              } else {
               alert('Password should include uppercase!');
               return false;
              }
            
              
              var numbers = /[0-9]/g;
              if(myInput.value.match(numbers)) {
                
              } else {
                alert('Password should include number!');
                return false;
              }
            
              
              if(myInput.value.length >= 8) {
                
              } else {
                alert('Password should have minimum 8 character!');
                return false;
              }
              if((myInput.value) == (conpass.value)){
                  
              }else{
                  alert('Both passwords should match!');
                  return false;
              }
       }


        function login(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";

        }
        function register(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";

        }

    </script>
    <script>
        var preload = document.getElementById("load");
        function loadend(){
          preload.style.display = "none";
        }
      </script>
</body>
>>>>>>> refs/remotes/origin/master
</html>