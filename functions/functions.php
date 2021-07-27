
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/nubyan.css">
<script src="https://kit.fontawesome.com/4aea877636.js" crossorigin="anonymous"></script>

<?php

   $con = mysqli_connect("localhost","root","","vfxukru");

   if(mysqli_connect_errno()){
      echo "Failed to connect to MYSQL: " .mysqli_connect_error();
   }
   //Get ip address 
   function getIp() {
      $ip = $_SERVER['REMOTE_ADDR'];

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }

      return $ip;
   }


//cart

function cart(){

if(isset($_GET['add_cart'])){

global $con;
$ip = getIp();
$pro_id = $_GET['add_cart'];
$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
$run_check = mysqli_query($con, $check_pro);

if(mysqli_num_rows($run_check)>0){
   echo "";
}
else {
   $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
   $run_pro = mysqli_query($con, $insert_pro);
   echo "<script>window.open('index.php','_self')</script>";
     }
}
}

//getting total added items


function total_items(){

   if(isset($_GET['add_cart'])){
      global $con;
      $ip = getIp();
      $get_items = "select * from cart where ip_add='$ip'";
      $run_items = mysqli_query($con, $get_items);
      $count_items = mysqli_num_rows($run_items);
   }
      else {
         global $con;
         $ip = getIp();
         $get_items = "select * from cart where ip_add='$ip'";
         $run_items = mysqli_query($con, $get_items);
         $count_items = mysqli_num_rows($run_items);
   
      }
      echo $count_items;
   
     
}
// getting total price items in the cart

   function total_price(){

      $total = 0;
      global $con;
      $ip = getIp();
      $select_price = "select * from cart where ip_add='$ip'";
      $run_price = mysqli_query($con, $select_price);

      while($p_price=mysqli_fetch_array($run_price)){
         $pro_id = $p_price['p_id'];
         $pro_price = "select * from products where product_id='$pro_id'";
         $run_pro_price = mysqli_query($con, $pro_price);

         while($pp_price = mysqli_fetch_array($run_pro_price)){
            $product_price = array($pp_price['product_price']);
            $values = array_sum($product_price);
            $total += $values;
         }
      }
      echo '&#8377;' . $total ;
   }

//getting categories

function getCats() {

    global $con;
    $get_cats = "select * from category";
    $run_cats = mysqli_query($con, $get_cats);

     while ($row_cats=mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_name'];

        echo "<li class='nav-item '><a class='nav-link' id='category' href='index.php?cat=$cat_id'>$cat_title</a></li>";
     }


}


function getpro(){

   if(!isset($_GET['cat'])){
      
      global $con;
      $get_pro = "select * from products order by RAND() LIMIT 0,6";
      $run_pro = mysqli_query($con, $get_pro);

      while($row_pro=mysqli_fetch_array($run_pro)){

         $pro_id = $row_pro['product_id'];
         $pro_title = $row_pro['product_title'];
         $pro_cat = $row_pro['product_cat'];
         $pro_url = $row_pro['product_url'];
         $pro_price = $row_pro['product_price'];
         $pro_res = $row_pro['product_res'];
         $pro_fps = $row_pro['product_fps'];
         $pro_soft = $row_pro['product_soft'];
         $pro_desc = $row_pro['product_desc'];
   
         echo "
            <div class='mb-3 border-bottom border-5 border-success d-flex flex-row justify-content-around' id='videos'>
               <div class='flex-column mr-2'>
                  <h3 class='text-success'>$pro_title</h3>
                  <iframe src='$pro_url'></iframe>
                  <p class='text-light bg-success price'> price &#8377; <b>$pro_price</b></p>
               </div>
               <div class='flex-row'>
               <a href='details.php?pro_id=$pro_id' class='align-self-end'><button class='btn btn-light mb-2 mr-2'>Details</button></a>
               <a href='index.php?add_cart=$pro_id' class='align-self-end'><button class='btn btn-success mb-2' id='cart'>Add to Cart</button></a>
               </div>
               
               
            </div>            
         ";
    }
   }
}




function getCatPro(){

   if(isset($_GET['cat'])){
      $cat_id = $_GET['cat'];
   global $con;

   $get_cat_pro = "select * from products where product_cat='$cat_id'";


   $run_cat_pro = mysqli_query($con, $get_cat_pro);

   $count_cats = mysqli_num_rows($run_cat_pro);
      
   if($count_cats==0){

      echo "<h2>There is no product in this category!</h2>";
     
   }
   
   while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

      $pro_id = $row_cat_pro['product_id'];
      $pro_title = $row_cat_pro['product_title'];
      $pro_cat = $row_cat_pro['product_cat'];
      $pro_url = $row_cat_pro['product_url'];
      $pro_price = $row_cat_pro['product_price'];
      $pro_res = $row_cat_pro['product_res'];
      $pro_fps = $row_cat_pro['product_fps'];
      $pro_soft = $row_cat_pro['product_soft'];
      $pro_desc = $row_cat_pro['product_desc'];

      
       
      echo "
            <div class='mb-3 border-bottom border-5 border-success d-flex flex-row justify-content-around' id='videos'>
               <div class='flex-column'>
                  <h3 class='text-success'>$pro_title</h3>
                  <iframe src='$pro_url'></iframe>
                  <p class='text-light bg-success price'> price &#8377; <b>$pro_price</b></p>
               </div>
               <div class='flex-row'>
               <a href='details.php?pro_id=$pro_id' class='align-self-end'><button class='btn btn-light mb-2 mr-2'>Details</button></a>
               <a href='index.php?add_cart=$pro_id' class='align-self-end'><button class='btn btn-success mb-2' id='cart'>Add to Cart</button></a>
               </div>
               
               
            </div>            
         ";
       
   }
}
}



?>
