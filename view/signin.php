<?php
session_start();
include "../system/conn.php";
$conn= koneksi();
if (isset($_SESSION["login"])) {
  # code...
  header("location:../index.php");
  exit;
}

if (isset($_POST["submit"])) {
  # code...
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
  //cek username
  if(mysqli_num_rows($result)){
    // cek passnya
    $row=mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){
      //set session
      $_SESSION["login"]=TRUE;
      $_SESSION['username']=$username;
      header("location: ../index.php");
      exit;
    }
    
  }
  $error = TRUE;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/signin.css">
  <title>Log In</title>
</head>
<body>
  <div class="container">
    <!--Gallery-->
    <div class="left-side col-md-8">
      <!-- Content START -->
      <div id="slideshow-mudah" class="carousel slide" data-ride="carousel">
      
    
      <!-- Wrapper for slides, Ini adalah Tempat Gambar-->
      <div class="carousel-inner">
        <div class="item active">
          <img src="../Image/Background.png"> <!—-Gambar -->
          <div class="carousel-caption"> <!—-Penjelasan -->
            
          </div>
        </div>
        <div class="item">
          <img class="" src="../Image/bg3.png"> <!—Gambar -->
          <div class="carousel-caption">  <!—Penjelasan -->
            
          </div>
        </div>
        <div class="item">
          <img src="../Image/Bg4.png"> <!—Gambar -->
          <div class="carousel-caption"> <!—Penjelasan -->
            
          </div>
        </div>
        
      </div>
    
      <!-- Controls, Ini adalah Panah Kanan dan Kiri. item ini dapat dihapus jika tidak diperlukan-->
      <a class="left carousel-control" href="#slideshow-mudah" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#slideshow-mudah" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      </div>
      <!-- Content END -->
  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="../bootstrap/js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../bootstrap/js/bootstrap.min.js"></script>
    </div>
    <!--End of Gallery-->

    <!--Registration part-->
    <div class="right-side col-md-4 text-center">
        <a href="">
          <img class="logo" src="../Image/logo3.png" alt="">
        </a>
        <h2>Log In</h2>
        <?php
        if (isset($error)) :?>
          <p style="color:red; font-style:italic;">Userame/Password Salah</p>
        <?php endif; ?>
            <form class="form-horizontal text-center" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="inputUname" placeholder="Username" require="required" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password", name="password" require="required">
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info" name="submit">Sign In</button>
              </div>
              <!-- /.box-footer -->
            </form>
        <div class="row">
          <p>Belum Punya akun? Daftar <a href="signup.php">Disini</a></p>
          
        </div>      
      
    </div>
    <!--End of Registration part-->


  </div>

</body>
</html>