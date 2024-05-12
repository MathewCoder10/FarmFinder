<?php

@include 'confige.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>
<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="csss/styles.css">
    <link rel="stylesheet" href="styl.css">
	<!-- <link rel="stylesheet" href="styl.css"> -->
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">LUF</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<h2 class="u-name">Admin dashboard</b>
	</header>
	<div class="body">
		<nav class="side-bar">
			<ul>
				<li>
					<a href="#">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="admin_user.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>User</span>
					</a>
				</li>
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="sec" id="services">
        <div class="content">
		<div class="mxw800p">
           <h3>Let Us Farm</h3>
           <p>Details of total number of users,total number of admins,total number of advisors and total number of farmers.<br><br>
		   Details of total number of farms,total number of ground based farms,total number of terrace based farms and total number of water based farms.
            </p>
        </div>
         
        <div class="services">
            

		
		    <div class="box">
                
                <div class="content">
                    <?php 
					require 'confige.php';
					$query = "SELECT id from user_form ORDER BY id";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of users
                    </p>
                </div>
             </div>
            <div class="box">
				
                
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from user_form  where user_type = 'admin' ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of admin
                    </p>
                    
                </div>
            </div> 
            <div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from user_form  where user_type = 'advisor' ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of advisors
                    </p>
                </div>
            </div>
			<div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from user_form  where user_type = 'user' ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of farmers
                    </p>
                </div>
            </div>
		    <div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from products  ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of farms
                    </p>
                </div>
				</div>
				<div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from products where type = 'ground'  ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of ground based farms
                    </p>
					</div>
				</div>
				<div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from products where type = 'terus'  ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of terrace based farms
                    </p>
					</div>
				</div>
				<div class="box">
                <div class="content">
				<?php 
					require 'confige.php';
					$query = "SELECT id from products where type = 'aqua'  ";
					$query_run = mysqli_query($conn,$query);
					$row=mysqli_num_rows($query_run);
					echo '<h1>'.$row.'</h1>';
					?>
                    <p>Total number of water based farms
                    </p>
					</div>
				</div>
				
        </div>
       </section>
	</div>

</body>
</html>
