 <?php
include "../system/createuser.php";
  
if (isset($_POST["submit"])) {
    if (registration($_POST)>0) {
        mysqli_query($conn, "CREATE TABLE $username (
            codeBarang VARCHAR(5),
        )");
        $_SESSION['username']=$username;
        echo "<script>
        alert('User Baru Berhasil ditmbahkan');
        </script>";
        
    }else{ 
        echo mysqli_error($conn);
    }

}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Sign Up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="../css/signup.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css.map">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

<style>
</style>
</head>
<body>
<div class="container">
    
    <div class="signup-form text-center">
        <form action="" method="post">
        <a href="">
            <img class="logo" src="../Image/logo3.png" alt="">
        </a>
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group"> 
                <input type="text" class="form-control" name="name" placeholder="Name" required="required"> 	
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required="required">
            </div>        
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
            </div>
        </form>
        <div class="text-center"style="color:black;">Already have an account? <a href="../index.php">Sign in</a></div>
    </div>
</div>
</body>
</html>