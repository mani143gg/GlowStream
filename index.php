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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="styles/l1.css">
<title>Title</title>
</head>
<body>
<!-- Navigation -->
<nav class="navbar-inverse gr " role="navigation" >
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="ecommerce.html"><i class="fa fa-fire"></i> Bootstrap Store</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="active dropdown-toggle" data-toggle="dropdown">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <?php 
                       global $con;
                       $get_cats = "select * from category";
                       $run_cats = mysqli_query($con, $get_cats);
                   
                        while ($row_cats=mysqli_fetch_array($run_cats)){
                   
                           $cat_id = $row_cats['cat_id'];
                           $cat_title = $row_cats['cat_name'];
                   
                           echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                        }
                      ?>
                    </ul>
                </li>
                <!-- <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li> -->
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#" data-toggle="modal" data-target="#myModal">Sign In <i class="fa fa-check"></i></a></li>
                <li><a href="account.html">Account <i class="fa fa-user"></i></a></li> -->
                <li><a href="cart.php"><span class="badge pull-left"> Cart </span><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="myModalLabel">Sign In <i class="fa fa-arrow-circle-right"></i></h2>
            </div>
            <div class="modal-body">
                <form class="form-signin" role="form">
                    <h3 class="form-signin-heading">Sign In</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In <i class="fa fa-arrow-circle-right"></i></button>
                </form>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <a href="#" class="btn btn-facebook btn-large btn-caps btn-block">Facebook <span class="icon-facebook"><i class="fa fa-facebook-square"></i></span></a>
                </div>
                <div class="col-xs-3">
                    <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Twitter <span class="icon-twitter"><i class="fa fa-twitter-square"></i></span></a>
                </div>
                <div class="col-xs-3">
                    <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Instagram <span class="icon-instagram"><i class="fa fa-camera-retro"></i></span></a>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<hr>
<!-- Page Content Starts -->
<div id="content" class="container">
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-="" to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-="" to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-="" to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="slide-image" src="http://placehold.it/1140x350" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="http://placehold.it/1140x350" alt="">
                    </div>
                    <div class="item">
                        <img class="slide-image" src="http://placehold.it/1140x350" alt="">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container class with content as the id -->
<div class="container">
    <div class="well well-sm">
        <strong>Responsive Product Grid Starter Template</strong>
    </div>
    <div class="grid">
        <div class="content">
            <ul class="rig columns-5">
                <?php
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
                       <li>
                       <iframe src='$pro_url' class='product-image'></iframe>  
                       <h4>$pro_title</h4>
                       <p>$pro_desc</p>
                       <div class='price'> RS. 0</div>
                           <span style='text-decoration: line-through; color:red;'>Rs.$pro_price</span>
                           <hr>
                                 <a href='index.php?add_cart=$pro_id'>
                           <button class='btn btn-default btn-xs pull-right ' id='cart'  type='button' onclick='conf()'>
                               <i class='fa fa-cart-arrow-down'></i> Add To Cart </button> </a>
                               <a href='details.php?pro_id=$pro_id'>
                           <button class='btn btn-default btn-xs pull-left' type='button'>
                               <i class='fa fa-eye'></i> Details </button></a>
                       </li>           
                       ";
                  }
                 }
                ?>
                <?php
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
                           if($run_pro>0){
                           echo "<script>alert('sucess');
                           window.open('index.php','_self');
                                         
                                </script>";

                                 }
                             }
                        }
                ?>


                 <?php
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
                    <li>
                    <iframe src='$pro_url' class='product-image'></iframe>  
                    <h4>$pro_title</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <div class='price'> $0</div>
                        <span style='text-decoration: line-through; color:red;'>$2.99</span>
                        <hr>
                        <a href='index.php?add_cart=$pro_id'>
                           <button class='btn btn-default btn-xs pull-right ' id='cart'  type='button' onclick='conf()'>
                               <i class='fa fa-cart-arrow-down'></i> Add To Cart </button> </a>
                               <a href='details.php?pro_id=$pro_id'>
                           <button class='btn btn-default btn-xs pull-left' type='button'>
                               <i class='fa fa-eye'></i> Details </button></a>
                    </li>        
                       ";
                     
                 }
              }
                 ?>


            </ul>
        </div>
        <div class="sidebar">
            <!-- Category List Start -->
            <h3 style="color:white">Categories</h3>
            <div class="list-group">
                        <?php 
                       global $con;
                       $get_cats = "select * from category";
                       $run_cats = mysqli_query($con, $get_cats);
                   
                        while ($row_cats=mysqli_fetch_array($run_cats)){
                   
                           $cat_id = $row_cats['cat_id'];
                           $cat_title = $row_cats['cat_name'];
                   
                           echo "<a href='index.php?cat=$cat_id' class='list-group-item'>$cat_title</a>";
                        }
                      ?>
                
            </div>
        </div>
    </div>
    <!-- /.container class with content as the id-->
    <!-- Footer -->
    <div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © <a href="ecommerce.html">Black&amp;White Publishing</a> 2017</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>