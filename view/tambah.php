<?php
include '../system/conn.php';
$conn= koneksi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="../css/signup.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css.map">
<title>Admin</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

</head>
<body>
<div class="container">
    
    <div class="signup-form text-center">
          <form action="" method="post" enctype="multipart/form-data">
            <a href="">
                <img class="logo" src="../Image/logo3.png" alt="">
            </a>
            <div class="form-group"> 
                <input type="text" class="form-control" name="productName" placeholder="Nama Produk" required="required"> 	
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="productPrice" placeholder="Harga Produk" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="productCode" placeholder="Kode Produk" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="desc" placeholder="Deskripsi" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="desc2" placeholder="Deskripsi Lainnya" required="required">
            </div>
            <div class="form-group">
            <select name="category" id="category">
                        <option value=4>Tenda</option>
                        <option value=5>Cooking Set</option>
                        <option value=6>BackPack</option>
                        <option value=7>Sepatu</option>
                        <option value=8>Lighting</option>
                        <option value=9>Sleeping Set</option>
                        <option value="10">Others</option>
                      </select>
            </div>
            <div class="form-group">
              <input type="file" class="form-control" id="customFile" name="productPic"/>
            </div>
               
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Tambah</button>
            </div>
        </form>
        <?php

  

if (isset($_POST['submit'])) {

  # code...
  // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $target_dir = "../uploads/";
      $target_file = $target_dir . basename($_FILES["productPic"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $check = getimagesize($_FILES["productPic"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["productPic"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["productPic"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $productName=$_POST["productName"];
    $productPrice=$_POST["productPrice"];
    $dir=$target_dir;
    $filename=$target_file;
    $productCode=$_POST["productCode"];
    $productcategory=$_POST["category"];
    $productDesc=$_POST["desc"];
    $productDesc2=$_POST["desc2"];

    mysqli_query($conn,"INSERT INTO products VALUES(0,$productCode,'$productName',$productPrice,'$productDesc','$productDesc2','$filename','$productcategory')");
    echo mysqli_error($conn);
}

?>
    </div>
</div>
</body>
</html>