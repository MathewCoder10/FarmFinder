<?php

@include 'confige.php';

session_start();

if(isset($_POST['submit']))
{

   
   $email = $_POST['email'];
   $password = $_POST['password'];
   

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0)
   {

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin')
      {

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');

      }
      elseif($row['user_type'] == 'user')
      {

         $_SESSION['user_name'] = $row['name'];
         header('location:farmer.php');

      }
      elseif($row['user_type'] == 'advisor')
      {

        $_SESSION['advisor_name'] = $row['name'];
        header('location:advisor.php');

     }
   }
   else
   {
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stl.css">
</head>
<body>
    
</body>
</html>
<div id="wrapper">
      <div id="left">
        <div id="signin">
        <div class="logo">
            </h1>
            <h1>Let Us Farm</h1>
          </div>
          <form action="" method="post">
          <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <div>
              <label>Email</label>
              <input type="email" class="text-input" name="email" />
            </div>
            <div>
              <label>Password</label>
              <input type="password" class="text-input" name="password"/>
            </div>
            <button type="submit" class="primary-btn" name="submit">Sign In</button>
          </form>
         
          <div class="or">
            <hr class="bar" />
            <span>OR</span>
            <hr class="bar" />
          </div>
          <a href="signup.php" class="secondary-btn">Create an account</a>
        </div>
       
      </div>
      <div id="right">
        <div id="showcase">
          <div class="showcase-content">
            <h1>
              Let's create the future <strong>together</strong>
            </h1>
            
          </div>
        </div>
      </div>
    </div>
    </body>
    </html>