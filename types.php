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
      
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylees.css">
</head>
<body>
    <!--header-->
    
    <h1 class="typewriter">THREE TYPES<br><span> OF </span>FARMING</h1>
    <figure class="container">
            <img src="images/imgs.jpg" alt="" />
            <figcaption>
                <h3>Ground</h3>
            </figcaption>
            <a href="ground.php"></a>
        </figure>
        <figure class="container">
            <img src="images/img4.webp" alt="" />
            <figcaption>
                <h3>Terrace</h3>
            </figcaption>
            <a href="terrace.php"></a>
        </figure>
        <figure class="container">
            <img src="images/img6.webp" alt="" />
            <figcaption>
                <h3>Aqua</h3>
            </figcaption>
            <a href="aqua.php"></a>
        </figure>
        </body>
</html>