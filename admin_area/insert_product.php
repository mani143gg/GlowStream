<?php
include("includes/db.php");
?>
<html>
<head>
    <title>product insertion</title>
    <!-- <script src="https://tinymce.cachefly.net/4.1/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script> -->
</head>
<body>
    

<form action="insert_product.php" method="post" enctype="multipart/form-data">


<table align="center" width="750">

<tr>
<td>Insert Products</td>
</tr>

<tr>
<td>product title</td>
<td><input type="text" name="product_title" id=""></td>
</tr>

<tr>
<td><b>Product Category</b></td>
<td>
<select name="product_cat" id="">
    <option value="">Select a category</option>
    <?php 

         $get_cats = "select * from category";
         $run_cats = mysqli_query($con, $get_cats);
     
          while ($row_cats=mysqli_fetch_array($run_cats)){
     
             $cat_id = $row_cats['cat_id'];
             $cat_title = $row_cats['cat_name'];
     
             echo "<option value='$cat_id'>$cat_title</option>";
          }
     
   ?>
</select>
</td>   
</tr>

<tr>
<td>Youtube URL</td>
<td><input type="text" name="product_url" id=""> </td>
</tr>


<tr>
<td>Price</td>
<td><input type="text" name="product_price" id=""> </td>
</tr>

<tr>
<td>Resolution</td>
<td><input type="text" name="product_res" id=""></td>
</tr>
<tr>
<td>FPS</td>
<td><input type="text" name="product_fps" id=""></td>
</tr>

<tr>
<td>Softwares</td>
<td><input type="text" name="product_soft" id=""></td>
</tr>

<tr>
<td>Product Description</td>
<td><textarea name="product_desc" id="" cols="18" rows="8"></textarea></td>
</tr>


<tr>
<td>File upoload</td>
<td> <input type="file" name="file" ></td>
</tr>

<tr align="center">
<td><input type="submit" name="insert_post" value="Insert Product"></td>
</tr>

</table>
</form>

</body>
</html>


<?php



if(isset($_POST['insert_post']) && !empty($_FILES["file"]["name"])){
    $targetDir = "files/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('gif','zip','rar','mp3','mp4');
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_url = $_POST['product_url'];
    $product_price = $_POST['product_price'];
    $product_res = $_POST['product_res'];
    $product_fps = $_POST['product_fps'];
    $product_soft = $_POST['product_soft'];
    $product_desc = $_POST['product_desc'];
    
    
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
  $insert_products = "INSERT INTO products (product_title,product_cat,product_url,product_price,product_res,product_fps,product_soft,product_desc,file) VALUES ('$product_title','$product_cat','$product_url','$product_price','$product_res','$product_fps','$product_soft','$product_desc','$fileName') ";
// echo "$fileName";
$insert_pro = mysqli_query($con, $insert_products);

if($insert_pro){

    echo "<script>alert('Product Has been inserted ')</script>";

     echo "<script>window.open('insert_product.php','_self')</script>";
}

}
    }

}
?>