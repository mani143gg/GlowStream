
<?php include("functions/functions.php"); ?>

<!--boiler plate-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles/ads.css">
		<title>Glow your Stream</title>
		<script data-ad-client="ca-pub-9915187104900026" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	</head>
	<body id="page">

	<!--Jumbotron-->

		<div class="container mt-3" id="jumbo">
			<div class="container">
				<!--flex-->
				<div class="d-flex flex-column">
					<div class="p-2">
						<h1 class="display-4 text-success">Explore & Buy Videos</h1>
					</div>
  				</div>
			</div>
		</div>

		<!--navbar-->
		<nav class="d-flex flex-row bg-success navbar-dark w-100 navbar navbar-expand-lg" id="nav">
			<!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
					<a href="index.php" class="nav-element mr-2 nav-item"><i class="fas fa-home fa-lg mr-1"></i>Home</a>
					<a href="all_products.php" class="nav-element mr-2 nav-item"><i class="fas fa-video fa-lg mr-1"></i>All products</a>
					<!-- <a href="customer/my_account.php" class="nav-element mr-2 nav-item"><i class="fas fa-user fa-lg mr-1"></i>My Account</a>		   -->
					<a href="cart.php" class="nav-element mr-2 nav-item"><i class="fas fa-shopping-cart fa-lg mr-1"></i>Shopping Cart</a>
      				<!-- <a href="#" class="nav-element mr-2 nav-item"><i class="fas fa-user-plus mr-1"></i>Sign Up</a> 
					<a href="#" class="nav-element mr-2 nav-item"><i class="fas fa-phone fa-lg mr-1"></i>Contact Us</a> -->
			</div>
		</nav>

		<div class="container" id="bodyNonCommon">
		<!--for search-->

			<div id="search_videos" class="">	
		  		<form class="form-row justify-content-center" method="get" action="result.php" enctype="multipart/form-data" >
		   			<input class="form-control form-control-lg mr-2 col-md-9" type="text" name="user_query" id="" placeholder="search video" />
		   
		   			<div class="input-group-append">
		   				<input class="btn btn-lg btn-success my-2 my-sm-0 " id="searchButton" type="submit" value="search" name="search" />
  					</div>
		 		</form>
			</div>

			<div class="row mt-3">
				<div class="col-md-2"><!-- for the sidebar categories-->
					<div id="sidebar_title" class="">
						<h2 class="text-success" id="cat">Category</h2> 
					</div>
					<nav class="nav">
						<ul id="linkcat" class="nav nav-pills flex-column ">
						<?php getCats(); ?>
		
						</ul>
					</nav>
				</div>
			<div class="col-md-8"><!-- for the main area-->
			<?php cart(); ?>
		

				<div class=""> 
					<?php getpro(); ?>
					<?php getCatPro(); ?>
				</div>
		

			</div>
			<div class="col-md-2">
				<!-- <div id="shopping_cart">
				
					<p class="text-success"><span class="display-4">Welcome guest </span><b>Shopping cart</b><br> Total items: <?php total_items(); ?><br> Total Price: <?php total_price(); ?><br> <a href="cart.php" class="btn btn-outline-success">Go to cart</a></p>
				</div> -->
				<amp-auto-ads type="adsense"
      				  data-ad-client="ca-pub-9915187104900026">
				</amp-auto-ads>
			</div>	

			

		</div>
		</div>

<!-- Footer -->



<div class="customfooter card text-center bg-success mt-3">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>
 
 
		<!--my kavascript-->
		<script src="js/nubyan.js"></script>

		<!--bootstrap js-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('[data-spy="scroll"]').each(function() {
      var $spy = $(this).scrollspy('refresh')
    })
  </script>
		</body>
</html>