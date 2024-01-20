<html>
<head>
   <link rel="icon" href="msbte.jpeg" type="image/x-icon">
   <style>
    * {
            margin: 0%;
            padding: 0%;
            background-color: #3B5998;
        }

        .text {
            margin-top: 10px;
           

        }

        h1 {
            font-size: 55px;
            color: white;
            font-family: sans-serif;
        }

        h2 {
            font-family: sans-serif;
            font-size: 20px;
            width: 500px;
        }

        .sub {

            background-color: #1877f2;
            color: white;
            padding: 15px, 30px;
            font-size: 30px;
        }

        .container {

            width: 30%;
            height: 350px;
            margin-top: 20px;
            margin-left: 35%;
            border-radius: 12px;
            background-color: white;
            text-align: center;
            overflow:visible;
        }

        .form {
            float: right;
            background-color: white;
            padding: 20px;
            border-radius:8px;
        }

        .form input {
            margin-top: 30px;
            margin-left: -10px;
            border-radius: 8px;
            margin-right: 10px;
            padding: 12px;
            width: 332px;
         
        }
        .form input[type="text"]
        {
            background-color: white;
        }
        .form input[type="password"]
        {
            background-color: white;
        }
        .container h1{
            color:#333;
            font-size:22px;
        }
    
        .fh{
            background-color:white;
        }
        .h3
        {
            color: white;
        }
   </style>
</head>
<body >
   <div class="text">
      <center><h1>LOGIN FORM</h1></center><br><br>
      <center><img src="msbte.jpeg" style="width:100px;height:100px"></center>
   </div><br><br>
   <form method="POST" >
      <div class="container">
        
         <div class="form">
            <h1 class="fh">Login Here</h1>
            <input type="text" class="t1" id="text1" name="username" placeholder="Enter username " required  ><br><br>
            <input type="password" class="p1" id="pass2" name="password" placeholder="Password" required><br><br>
            <input type="submit" class="sub" name="login" id="login" value="Login"><br>
                
         </div>
         
       
      </div>
   </form>

</body>
</html>
<?php
if(isset($_POST['login']))
{   

    session_start();
    $_SESSION['USER']=$_POST['username'];
    $_SESSION['PASS']=$_POST['password'];
    if($_SESSION['USER']=="CHINU" &&  $_SESSION['PASS']=="123")
    {
    echo"
        <script>
            window.location.href='table_creation.php';
        </script>
    ";
    }
    else
    {
    echo"
        <script>
            window.location.href='certificate.php';
        </script>
    ";
    }

}
?>