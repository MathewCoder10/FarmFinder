<?php

@include 'confige.php';

if(isset($_POST['add_product']))
{
   $area = $_POST['area'];
   $type = $_POST['type'];
   $helper = $_POST['helper'];
   $tymspent = $_POST['tymspent'];
   $hide=3;
  
   if(empty($area) || empty($type) || empty($helper) || empty($tymspent) )
   {
      $message[] = 'please fill out all';
   }
   
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>filter</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="csss/stile.css">
   <link rel="stylesheet" href="csss/style.css">
   
</head>
<body>

<?php

if(isset($message))
{
   foreach($message as $message)
   {
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   <?php if(!isset($hide)) { ?>
<div class="container">
  
   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Suitable crop for you</h3>
        
		 <label class="form-label"><h2>How much area available?</h2></label>
         <select name="area" class="box">
         <option value="1">area of 1 to 2 cent </option>
         <option value="2">area of 3 to 10 cent</option>
         <option value="3">area of 10 to 15 cent</option>
         </select>
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
         <input type="submit" class="btn" name="add_product" value="Submit">
      </form>
       
   </div>
   

        
    </div>
   <?php }?> 

   <?php if(isset($hide)) { ?>
        <?php
     
   
        $select=mysqli_query($conn,"SELECT * FROM products where  area ='$area' and type='$type' and helper='$helper' and tymspent='$tymspent' ");
        $count=mysqli_num_rows($select);
        
        if($count == 0)
        {
            $messages[] = 'oops No farm found';
        }
        if(isset($messages))
       {
        foreach($messages as $messages)
       {
         echo '<span class="message">'.$messages.'</span>';
       }
        }
     ?>
    
            <div class="product-display">
            <table class="product-display-table">
               <thead>
               <tr>
                  <th>farm image</th>
                  <th>farm name</th>
                  <th>discription</th>
               </tr>
               </thead>
               <?php while($row = mysqli_fetch_assoc($select)){ ?>
               <tr>
                  <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['disc']; ?></td>
               </tr>
            <?php } ?>
            </table>
         </div>
               
        
     <?php }?> 
   
     
           
</div>
</body>
</html>