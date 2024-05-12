<?php

@include 'confige.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $area = $_POST['area'];
   $disc = $_POST['disc'];
   $type = $_POST['type'];
   $helper = $_POST['helper'];
   $tymspent = $_POST['tymspent'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($area) || empty($disc) || empty($type) || empty($helper) || empty($tymspent) || empty($product_image)){
      $message[] = 'please fill out all!';    
   }
   else{

      $update_data = "UPDATE products SET name='$product_name', area='$area', disc='$disc' , type='$type',  helper='$helper', tymspent='$tymspent' , image='$product_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:advisor.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="csss/stile.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the farm</h3>
         <label class="form-label"><h2>Enter the name of farm?</h2></label>
         <input type="text" value="<?php echo $row['name']; ?>" placeholder="enter farm name" name="product_name" class="box">
         
         <label class="form-label"><h2>How much area available?</h2></label>
         <select name="area" class="box">
         <option value="1">area of 1 to 2 cent </option>
         <option value="2">area of 3 to 10 cent</option>
         <option value="3">area of 10 to 15 cent</option>
         </select>
         <label class="form-label"><h2>Enter the discription of farm?</h2></label>
         <input type="text"  value="<?php echo $row['disc']; ?>" placeholder="discribe the farm" name="disc" class="box">
         <label class="form-label"><h2>Which type of farming you prefer?</h2></label>
         <select name="type" class="box">
         <option value="ground">Ground</option>
         <option value="terus">Terrace</option>
         <option value="aqua">Aqua</option>
         </select>
         <label class="form-label"><h2>Do you have any helper?</h2></label>
         <select name="helper" class="box">
         <option value="yes">Yes</option>
         <option value="no">No</option>
         </select>
         <label class="form-label"><h2>How much time you spent in each day?</h2></label>
         <select name="tymspent" class="box">
         <option value="30">30 minutes</option>
         <option value="45">45 minutes</option>
         <option value="60">60 minutes</option>
         </select>
         <label class="form-label"><h2>Place image here..</h2></label>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="advisor.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>