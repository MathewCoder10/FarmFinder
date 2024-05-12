<?php

@include 'confige.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head link="black">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>farmer</title>
    <style>
      a{
        
       text-decoration: none;
    }
    .banner .b1{
  border-radius: 9px;
  color: #f9f3f4;
  text-decoration: none;
  font-family: 'Century Gothic',sans-serif;
  border: 3px solid;
  padding: 7px 13px;
  font-weight: bold;
}
.banner .b1:hover{
  color: green;
}
    
    </style>
    <link rel="stylesheet" href="styl.css">
    
    </head>
<body>
    <!--header-->
    <header>
        <a href="#" class="logo">LUF</a>
        <ul>
            <li><a href="types.php" >Types</a></li>
            <li><a href="foryou.php" >Foryou</a></li>
            <li><a href="ferti.php">Fertilizer</a></li>
            <li><a href="logout.php" >Logout</a></li>
        </ul>
    </header>
    <!--Banner-->
    <!--Banner-->
    <section class="banner" id="home">
        <h2 >We Make <br><span> You </span>Farmer
    </h2>
    <div class="content">
        <a class="b1" href="types.php">GET STARTED</a>
        </div>
    </section>
    
       
    
</body>
</html>